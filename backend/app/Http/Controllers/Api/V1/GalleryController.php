<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GalleryResource;
use App\Models\Gallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $data = \Illuminate\Support\Facades\Cache::remember("api_gallery_{$lang}", 3600, function () {
            $gallery = Gallery::where(function ($q) {
                    $q->where('status', 'active')
                      ->orWhere('is_active', true);
                })
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            return GalleryResource::collection($gallery)->resolve();
        });

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'फोटो गॅलरी यशस्वीरित्या लोड केली' : 'Gallery items fetched successfully',
            'language' => $lang,
            'data' => $data,
        ]);
    }
}
