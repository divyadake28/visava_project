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
        $gallery = Gallery::where(function ($q) {
                $q->where('status', 'active')
                  ->orWhere('is_active', true);
            })
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '????? ????? ???????????? ???? ????' : 'Gallery items fetched successfully',
            'language' => $lang,
            'data' => GalleryResource::collection($gallery),
        ]);
    }
}
