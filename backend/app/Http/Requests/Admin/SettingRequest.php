<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'site_name_mr' => 'nullable|string|max:255',
            'site_name_en' => 'nullable|string|max:255',
            'site_email' => 'nullable|email|max:255',
            'site_phone' => 'nullable|string|max:50',
            'address_mr' => 'nullable|string',
            'address_en' => 'nullable|string',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'meta_title_mr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_description_mr' => 'nullable|string',
            'meta_description_en' => 'nullable|string',
            'meta_keywords_mr' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string',
            'hero_title_mr' => 'nullable|string|max:255',
            'hero_title_en' => 'nullable|string|max:255',
            'hero_subtitle_mr' => 'nullable|string',
            'hero_subtitle_en' => 'nullable|string',
            'about_title_mr' => 'nullable|string|max:255',
            'about_title_en' => 'nullable|string|max:255',
            'about_description_mr' => 'nullable|string',
            'about_description_en' => 'nullable|string',
            'why_title_mr' => 'nullable|string|max:255',
            'why_title_en' => 'nullable|string|max:255',
            'why_description_mr' => 'nullable|string',
            'why_description_en' => 'nullable|string',
            'contact_title_mr' => 'nullable|string|max:255',
            'contact_title_en' => 'nullable|string|max:255',
            'contact_description_mr' => 'nullable|string',
            'contact_description_en' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,ico,png|max:2048',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:30720',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:30720',
        ];
    }
}
