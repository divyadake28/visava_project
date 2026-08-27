<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PackageResource;
use App\Models\Package;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $packages = Package::where(function ($q) {
            $q->where('status', 'active')->orWhere('is_active', true);
        })
        ->orderBy('id', 'asc')
        ->get();

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? 'पॅकेजेस यशस्वीरित्या लोड केली' : 'Packages fetched successfully',
            'language' => $lang,
            'data' => PackageResource::collection($packages),
        ]);
    }

    public function show(Request $request, string $slug): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $package = Package::where('slug', $slug)
            ->where(function ($q) {
                $q->where('status', 'active')->orWhere('is_active', true);
            })
            ->first();

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => $lang === 'mr' ? '????? ?????? ????' : 'Package not found',
                'language' => $lang,
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '????? ????? ???????????? ???? ????' : 'Package details fetched successfully',
            'language' => $lang,
            'data' => new PackageResource($package),
        ]);
    }
}
