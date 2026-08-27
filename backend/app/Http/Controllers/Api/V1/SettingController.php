<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\FileUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');
        $fileService = app(FileUploadService::class);
        $settings = Setting::all()->pluck('value', 'key');

        $data = [
            'site' => [
                'name' => Setting::getLocalized('site_name', $lang, 'Visava Resort'),
                'email' => $settings['site_email'] ?? 'info@visava.com',
                'phone' => $settings['site_phone'] ?? '+91 9876543210',
                'address' => Setting::getLocalized('address', $lang),
                'logo' => $fileService->url($settings['logo'] ?? null),
                'favicon' => $fileService->url($settings['favicon'] ?? null),
            ],
            'social' => [
                'facebook' => $settings['facebook_url'] ?? '',
                'instagram' => $settings['instagram_url'] ?? '',
                'youtube' => $settings['youtube_url'] ?? '',
                'linkedin' => $settings['linkedin_url'] ?? '',
            ],
            'seo' => [
                'meta_title' => Setting::getLocalized('meta_title', $lang),
                'meta_description' => Setting::getLocalized('meta_description', $lang),
                'meta_keywords' => Setting::getLocalized('meta_keywords', $lang),
            ],
            'homepage' => [
                'hero' => [
                    'title' => Setting::getLocalized('hero_title', $lang),
                    'subtitle' => Setting::getLocalized('hero_subtitle', $lang),
                    'image' => $fileService->url($settings['hero_image'] ?? null),
                ],
                'about' => [
                    'title' => Setting::getLocalized('about_title', $lang),
                    'description' => Setting::getLocalized('about_description', $lang),
                    'image' => $fileService->url($settings['about_image'] ?? null),
                ],
                'why_choose_us' => [
                    'title' => Setting::getLocalized('why_title', $lang),
                    'description' => Setting::getLocalized('why_description', $lang),
                ],
                'contact_section' => [
                    'title' => Setting::getLocalized('contact_title', $lang),
                    'description' => Setting::getLocalized('contact_description', $lang),
                ],
            ],
        ];

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' ? '???????? ??? CMS ???? ???????????? ???? ????' : 'Settings and CMS data fetched successfully',
            'language' => $lang,
            'data' => $data,
        ]);
    }
}
