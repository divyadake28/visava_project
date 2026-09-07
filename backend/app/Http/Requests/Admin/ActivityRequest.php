<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'short_description_mr' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'description_mr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:30720',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत अनुभव / उपक्रमाचे नाव प्रविष्ट करा. (Please provide an activity title in Marathi or English)',
            'title_en.required_without' => 'Please provide an activity title in English or Marathi.',
        ];
    }
}