<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogResource;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $blogs = Blog::where('status', 'active')
            ->orWhere('is_published', true)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '????? ???????????? ???? ????' : 'Blogs fetched successfully',
            'language' => $lang,
            'data' => BlogResource::collection($blogs),
        ]);
    }

    public function show(Request $request, string $slug): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $blog = Blog::where('slug', $slug)
            ->where(function ($q) {
                $q->where('status', 'active')->orWhere('is_published', true);
            })
            ->first();

        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => $lang === 'mr' ? '????? ?????? ????' : 'Blog post not found',
                'language' => $lang,
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '????? ????? ???????????? ???? ????' : 'Blog details fetched successfully',
            'language' => $lang,
            'data' => new BlogResource($blog),
        ]);
    }
}
