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
            'status' => $this->status ?? ($this->is_published ? 'active' : 'inactive'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
