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
        $data = \Illuminate\Support\Facades\Cache::remember("api_testimonials_{$lang}", 3600, function () {
            $testimonials = Testimonial::where('status', 'active')
                ->orWhere('is_approved', true)
                ->latest()
                ->get();

            return TestimonialResource::collection($testimonials)->resolve();
        });

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'अभिप्राय यशस्वीरित्या प्राप्त झाले' : 'Testimonials fetched successfully',
            'language' => $lang,
            'data' => $data,
        ]);
    }
}
