<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $testimonials = Testimonial::where('status', 'active')
            ->orWhere('is_approved', true)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '???????????? ???????????? ???? ????' : 'Testimonials fetched successfully',
            'language' => $lang,
            'data' => TestimonialResource::collection($testimonials),
        ]);
    }
}
