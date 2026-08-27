<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(): View
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Handle Image Uploads for CMS
        $imageFields = ['logo', 'favicon', 'hero_image', 'about_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $oldPath = Setting::get($field);
                $data[$field] = $this->fileService->upload($request->file($field), 'settings', $oldPath);
            }
        }

        // Map settings to their groups
        $groups = [
            'site_name_mr' => 'general',
            'site_name_en' => 'general',
            'site_email' => 'contact',
            'site_phone' => 'contact',
            'address_mr' => 'contact',
            'address_en' => 'contact',
            'logo' => 'general',
            'favicon' => 'general',
            'facebook_url' => 'social',
            'instagram_url' => 'social',
            'youtube_url' => 'social',
            'linkedin_url' => 'social',
            'meta_title_mr' => 'seo',
            'meta_title_en' => 'seo',
            'meta_description_mr' => 'seo',
            'meta_description_en' => 'seo',
            'meta_keywords_mr' => 'seo',
            'meta_keywords_en' => 'seo',
            'hero_title_mr' => 'hero',
            'hero_title_en' => 'hero',
            'hero_subtitle_mr' => 'hero',
            'hero_subtitle_en' => 'hero',
            'hero_image' => 'hero',
            'about_title_mr' => 'about',
            'about_title_en' => 'about',
            'about_description_mr' => 'about',
            'about_description_en' => 'about',
            'about_image' => 'about',
            'why_title_mr' => 'why_us',
            'why_title_en' => 'why_us',
            'why_description_mr' => 'why_us',
            'why_description_en' => 'why_us',
            'contact_title_mr' => 'contact_section',
            'contact_title_en' => 'contact_section',
            'contact_description_mr' => 'contact_section',
            'contact_description_en' => 'contact_section',
        ];

        foreach ($data as $key => $value) {
            $group = $groups[$key] ?? 'general';
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => $group]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Website & Homepage CMS settings updated successfully.');
    }
}
