<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title_mr' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'category_mr' => 'nullable|string|max:100',
            'category_en' => 'nullable|string|max:100',
            'image' => ($this->isMethod('post') ? 'required' : 'nullable') . '|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'status' => 'required|in:active,inactive',
        ];
    }
}