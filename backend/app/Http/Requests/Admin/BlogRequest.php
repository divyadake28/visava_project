<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'description_mr' => 'nullable|required_without:description_en|string',
            'description_en' => 'nullable|required_without:description_mr|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'title_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत शीर्षक प्रविष्ट करा. (Please provide a title in Marathi or English)',
            'title_en.required_without' => 'Please provide a title in English or Marathi.',
            'description_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत सविस्तर मजकूर प्रविष्ट करा. (Please provide content in Marathi or English)',
            'description_en.required_without' => 'Please provide full content in English or Marathi.',
        ];
    }
}