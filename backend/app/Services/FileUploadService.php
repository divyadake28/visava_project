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

        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads/' . $directory, $filename, 'public');

        return $path;
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
