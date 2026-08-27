<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'client_name' => 'required|string|max:255',
            'client_designation_mr' => 'nullable|string|max:255',
            'client_designation_en' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_mr' => 'nullable|required_without:review_en|string',
            'review_en' => 'nullable|required_without:review_mr|string',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'review_mr.required_without' => 'कृपया मराठी किंवा इंग्रजीपैकी एका भाषेत अभिप्राय प्रविष्ट करा. (Please provide a review in Marathi or English)',
            'review_en.required_without' => 'Please provide a review in English or Marathi.',
        ];
    }
}