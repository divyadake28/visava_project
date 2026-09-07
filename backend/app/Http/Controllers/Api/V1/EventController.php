<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EventResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $data = \Illuminate\Support\Facades\Cache::remember("api_events_{$lang}", 3600, function () {
            $events = Event::where(function ($q) {
                $q->where('status', 'active')->orWhere('is_active', true);
            })
            ->orderBy('id', 'asc')
            ->get();

            return EventResource::collection($events)->resolve();
        });

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'कार्यक्रम व सोहळे यशस्वीरित्या लोड केले' : 'Events fetched successfully',
            'language' => $lang,
            'data' => $data,
        ]);
    }

    public function show(Request $request, string $slug): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $event = Event::where('slug', $slug)
            ->where(function ($q) {
                $q->where('status', 'active')->orWhere('is_active', true);
            })
            ->first();

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => $lang === 'mr' ? '??????? ?????? ????' : 'Event not found',
                'language' => $lang,
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '??????? ????? ???????????? ???? ????' : 'Event details fetched successfully',
            'language' => $lang,
            'data' => new EventResource($event),
        ]);
    }
}
