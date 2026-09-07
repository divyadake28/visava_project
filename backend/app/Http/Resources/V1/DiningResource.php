<?php

namespace App\Http\Resources\V1;

use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiningResource extends JsonResource
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
            'badge' => $this->getLocalized('badge', $lang),
            'badge_mr' => $this->badge_mr,
            'badge_en' => $this->badge_en,
            'badge_icon' => $this->badge_icon,
            'category' => $this->getLocalized('category', $lang),
            'category_mr' => $this->category_mr,
            'category_en' => $this->category_en,
            'short_description' => $this->getLocalized('short_description', $lang),
            'short_description_mr' => $this->short_description_mr,
            'short_description_en' => $this->short_description_en,
            'image' => $fileService->url($this->image),
            'dietary_type' => $this->dietary_type,
            'sort_order' => (int) ($this->sort_order ?? 0),
            'status' => $this->status ?? ($this->is_active ? 'active' : 'inactive'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
