<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DiningResource;
use App\Models\Dining;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiningController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $cat = $request->query('category', 'all');

        $data = \Illuminate\Support\Facades\Cache::remember("api_dining_{$lang}_{$cat}", 3600, function () use ($cat) {
            $query = Dining::where(function ($q) {
                $q->where('status', 'active')
                  ->orWhere('is_active', true);
            });

            if ($cat !== 'all' && !empty($cat)) {
                $query->where(function ($q) use ($cat) {
                    $q->where('category_mr', $cat)
                      ->orWhere('category_en', $cat);
                });
            }

            $items = $query->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            return DiningResource::collection($items)->resolve();
        });

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'खाद्य मेनू यशस्वीरित्या लोड केले' : 'Dining items fetched successfully',
            'language' => $lang,
            'data' => $data,
        ]);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $item = Dining::where(function ($q) {
                $q->where('status', 'active')
                  ->orWhere('is_active', true);
            })
            ->find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => $lang === 'mr' ? 'खाद्य मेनू सापडला नाही' : 'Dining item not found',
                'language' => $lang,
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'खाद्य मेनू माहिती यशस्वीरित्या लोड झाली' : 'Dining item fetched successfully',
            'language' => $lang,
            'data' => new DiningResource($item),
        ]);
    }
}
