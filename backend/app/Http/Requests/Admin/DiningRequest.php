<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiningRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title_mr' => 'nullable|required_without:title_en|string|max:255',
            'title_en' => 'nullable|required_without:title_mr|string|max:255',
            'badge_mr' => 'nullable|string|max:100',
            'badge_en' => 'nullable|string|max:100',
            'badge_icon' => 'nullable|string|max:20',
            'category_mr' => 'nullable|string|max:100',
            'category_en' => 'nullable|string|max:100',
            'short_description_mr' => 'nullable|string|max:1000',
            'short_description_en' => 'nullable|string|max:1000',
            'image' => ($this->isMethod('post') ? 'required' : 'nullable') . '|image|mimes:jpeg,png,jpg,webp,gif|max:30720',
            'dietary_type' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'title_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत पदार्थाचे/मेनूचे नाव प्रविष्ट करा.',
            'title_en.required_without' => 'Please provide a dish/menu title in English or Marathi.',
            'image.required' => 'कृपया पदार्थाचा फोटो अपलोड करा.',
            'image.image' => 'अपलोड केलेली फाईल फोटो (Image) असणे आवश्यक आहे.',
            'image.max' => 'फोटोची साईझ ३०MB पेक्षा कमी असणे आवश्यक आहे.',
        ];
    }
}
