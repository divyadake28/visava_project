<?php

namespace App\Http\Resources\V1;

use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
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
            'category' => $this->getLocalized('category', $lang),
            'category_mr' => $this->category_mr,
            'category_en' => $this->category_en,
            'image' => $fileService->url($this->image ?? $this->image_path),
            'sort_order' => (int) ($this->sort_order ?? 0),
            'status' => $this->status ?? ($this->is_active ? 'active' : 'inactive'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
