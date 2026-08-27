<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'duration_mr' => 'nullable|string|max:100',
            'duration_en' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'short_description_mr' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'description_mr' => 'nullable|required_without:description_en|string',
            'description_en' => 'nullable|required_without:description_mr|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'title_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत पॅकेजचे नाव प्रविष्ट करा. (Please provide a package title in Marathi or English)',
            'title_en.required_without' => 'Please provide a package title in English or Marathi.',
            'description_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत पॅकेजचा तपशील प्रविष्ट करा. (Please provide package description in Marathi or English)',
            'description_en.required_without' => 'Please provide package description in English or Marathi.',
        ];
    }
}