<?php

namespace App\Http\Resources\V1;

use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $lang = $request->query('lang', 'mr');
        $fileService = app(FileUploadService::class);

        return [
            'id' => $this->id,
            'title' => $this->getLocalized('title', $lang),
            'title_mr' => $this->title_mr,
            'title_en' => $this->title_en,
            'slug' => $this->slug,
            'short_description' => $this->getLocalized('short_description', $lang),
            'short_description_mr' => $this->short_description_mr,
            'short_description_en' => $this->short_description_en,
            'description' => $this->getLocalized('description', $lang),
            'description_mr' => $this->description_mr,
            'description_en' => $this->description_en,
            'featured_image' => $fileService->url($this->featured_image),
            'blog_video' => $this->blog_video ? $fileService->url($this->blog_video) : null,
            'video_thumbnail' => $this->featured_image ? $fileService->url($this->featured_image) : null,
            'youtube_url' => $this->youtube_url,
            'youtube_id' => $this->extractYoutubeId($this->youtube_url),
            'instagram_url' => $this->instagram_url,
            'has_media' => [
                'image' => !empty($this->featured_image),
                'video' => !empty($this->blog_video),
                'youtube' => !empty($this->youtube_url),
                'instagram' => !empty($this->instagram_url),
            ],
            'status' => $this->status ?? ($this->is_published ? 'active' : 'inactive'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }

    private function extractYoutubeId(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?|shorts)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
