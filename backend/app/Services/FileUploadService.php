<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * Upload a file to public storage.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string|null $oldFile
     * @return string
     */
    public function upload(UploadedFile $file, string $directory = 'general', ?string $oldFile = null): string
    {
        // Delete old file if provided
        if ($oldFile) {
            $this->delete($oldFile);
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: 'jpg');
        $filename = time() . '_' . Str::random(10) . '.' . $extension;
        $relPath = 'uploads/' . $directory . '/' . $filename;
        $fullDestDir = Storage::disk('public')->path('uploads/' . $directory);

        if (!is_dir($fullDestDir)) {
            mkdir($fullDestDir, 0755, true);
        }

        $destFilePath = $fullDestDir . DIRECTORY_SEPARATOR . $filename;

        // Auto-optimize image using GD if available and applicable
        if (extension_loaded('gd') && in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
            try {
                if ($this->optimizeAndSaveImage($file->getRealPath(), $destFilePath, $extension)) {
                    return $relPath;
                }
            } catch (\Throwable $e) {
                // Fallback to standard Laravel storeAs if any error occurs
            }
        }

        $path = $file->storeAs('uploads/' . $directory, $filename, 'public');

        return $path;
    }

    /**
     * Resize and optimize images for high-speed web delivery while preserving quality.
     */
    protected function optimizeAndSaveImage(string $sourcePath, string $destPath, string $extension): bool
    {
        $info = @getimagesize($sourcePath);
        if (!$info) {
            return false;
        }

        $origWidth = $info[0];
        $origHeight = $info[1];

        // Create GD resource based on type
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $img = @imagecreatefromjpeg($sourcePath);
                break;
            case 'png':
                $img = @imagecreatefrompng($sourcePath);
                break;
            case 'webp':
                $img = @imagecreatefromwebp($sourcePath);
                break;
            default:
                return false;
        }

        if (!$img) {
            return false;
        }

        // Correct EXIF orientation for JPEG
        if (in_array($extension, ['jpg', 'jpeg']) && function_exists('exif_read_data')) {
            $exif = @exif_read_data($sourcePath);
            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 3:
                        $img = imagerotate($img, 180, 0);
                        break;
                    case 6:
                        $img = imagerotate($img, -90, 0);
                        $temp = $origWidth;
                        $origWidth = $origHeight;
                        $origHeight = $temp;
                        break;
                    case 8:
                        $img = imagerotate($img, 90, 0);
                        $temp = $origWidth;
                        $origWidth = $origHeight;
                        $origHeight = $temp;
                        break;
                }
            }
        }

        // Limit maximum dimension to 1920px
        $maxDimension = 1920;
        if ($origWidth > $maxDimension || $origHeight > $maxDimension) {
            if ($origWidth >= $origHeight) {
                $newWidth = $maxDimension;
                $newHeight = (int) round(($origHeight / $origWidth) * $maxDimension);
            } else {
                $newHeight = $maxDimension;
                $newWidth = (int) round(($origWidth / $origHeight) * $maxDimension);
            }

            $target = imagecreatetruecolor($newWidth, $newHeight);

            // Handle transparency for PNG/WebP
            if (in_array($extension, ['png', 'webp'])) {
                imagealphablending($target, false);
                imagesavealpha($target, true);
            }

            imagecopyresampled($target, $img, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($img), imagesy($img));
            imagedestroy($img);
            $img = $target;
        }

        // Save with high quality
        $result = false;
        if (in_array($extension, ['jpg', 'jpeg'])) {
            $result = imagejpeg($img, $destPath, 88);
        } elseif ($extension === 'webp') {
            $result = imagewebp($img, $destPath, 88);
        } elseif ($extension === 'png') {
            $result = imagepng($img, $destPath, 6);
        }

        imagedestroy($img);
        return $result;
    }

    /**
     * Delete a file from public storage.
     *
     * @param string|null $path
     * @return bool
     */
    public function delete(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }

    /**
     * Get full public URL for a stored image path.
     *
     * @param string|null $path
     * @param string|null $default
     * @return string|null
     */
    public function url(?string $path, ?string $default = null): ?string
    {
        if ($path) {
            if (Str::startsWith($path, ['http://', 'https://'])) {
                return $path;
            }
            return Storage::disk('public')->url($path);
        }

        return $default;
    }
}
