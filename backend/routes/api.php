<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'app' => config('app.name'),
        'environment' => config('app.env'),
        'timestamp' => now()->toIso8601String(),
    ]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ==========================================
// Public REST API v1 (Default Language: mr)
// ==========================================
Route::prefix('v1')->group(function () {
    // Blogs
    Route::get('/blogs', [\App\Http\Controllers\Api\V1\BlogController::class, 'index']);
    Route::get('/blogs/{slug}', [\App\Http\Controllers\Api\V1\BlogController::class, 'show']);

    // Events
    Route::get('/events', [\App\Http\Controllers\Api\V1\EventController::class, 'index']);
    Route::get('/events/{slug}', [\App\Http\Controllers\Api\V1\EventController::class, 'show']);

    // Packages
    Route::get('/packages', [\App\Http\Controllers\Api\V1\PackageController::class, 'index']);
    Route::get('/packages/{slug}', [\App\Http\Controllers\Api\V1\PackageController::class, 'show']);

    // Experiences & Activities
    Route::get('/activities', [\App\Http\Controllers\Api\V1\ActivityController::class, 'index']);
    Route::get('/activities/{id}', [\App\Http\Controllers\Api\V1\ActivityController::class, 'show']);

    // Galleries
    Route::get('/gallery', [\App\Http\Controllers\Api\V1\GalleryController::class, 'index']);

    // Testimonials
    Route::get('/testimonials', [\App\Http\Controllers\Api\V1\TestimonialController::class, 'index']);

    // Enquiries
    Route::post('/enquiries', [\App\Http\Controllers\Api\V1\EnquiryController::class, 'store']);

    // Settings & Homepage CMS
    Route::get('/settings', [\App\Http\Controllers\Api\V1\SettingController::class, 'index']);
});