<?php

namespace App\Http\Resources\V1;

use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'location' => $this->getLocalized('location', $lang),
            'location_mr' => $this->location_mr,
            'location_en' => $this->location_en,
            'event_date' => ($this->event_date ?? $this->start_date)?->toIso8601String(),
            'short_description' => $this->getLocalized('short_description', $lang),
            'short_description_mr' => $this->short_description_mr,
            'short_description_en' => $this->short_description_en,
            'description' => $this->getLocalized('description', $lang),
            'description_mr' => $this->description_mr,
            'description_en' => $this->description_en,
            'image' => $fileService->url($this->image ?? $this->banner_image),
            'price' => $this->price,
            'status' => $this->status ?? ($this->is_active ? 'active' : 'inactive'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
