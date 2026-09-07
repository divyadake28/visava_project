<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $data = \Illuminate\Support\Facades\Cache::remember("api_activities_{$lang}", 3600, function () {
            $activities = Activity::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            return ActivityResource::collection($activities)->resolve();
        });

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'अनुभव व उपक्रम यशस्वीरित्या प्राप्त झाले' : 'Activities fetched successfully',
            'language' => $lang,
            'data' => $data,
        ]);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $activity = Activity::where('id', $id)
            ->where('is_active', true)
            ->first();

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => $lang === 'mr' ? 'उपक्रम सापडला नाही' : 'Activity not found',
                'language' => $lang,
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'उपक्रमाचा तपशील यशस्वीरित्या प्राप्त झाला' : 'Activity details fetched successfully',
            'language' => $lang,
            'data' => new ActivityResource($activity),
        ]);
    }
}