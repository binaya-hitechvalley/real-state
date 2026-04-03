<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['nullable', 'string', 'max:255'],
            'client_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:1024'],
            'client_photo_url' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'client_name' => 'client name',
            'client_designation' => 'designation',
            'client_photo_url' => 'photo URL',
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.required' => 'The client name is required.',
            'content.required' => 'The testimonial content is required.',
            'rating.required' => 'The rating is required.',
            'rating.min' => 'Rating must be at least 1.',
            'rating.max' => 'Rating cannot exceed 5.',
        ];
    }
}
