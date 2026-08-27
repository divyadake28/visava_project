<?php

namespace App\Http\Resources\V1;

use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $lang = $request->query('lang', 'mr');
        $fileService = app(FileUploadService::class);

        return [
            'id' => $this->id,
            'client_name' => $this->client_name ?? $this->name,
            'client_designation' => $this->getLocalized('client_designation', $lang),
            'client_designation_mr' => $this->client_designation_mr,
            'client_designation_en' => $this->client_designation_en,
            'review' => $this->getLocalized('review', $lang),
            'review_mr' => $this->review_mr,
            'review_en' => $this->review_en,
            'rating' => (int) $this->rating,
            'client_image' => $fileService->url($this->client_image ?? $this->avatar),
            'status' => $this->status ?? ($this->is_approved ? 'active' : 'inactive'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
