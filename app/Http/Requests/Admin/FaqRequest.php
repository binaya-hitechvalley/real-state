<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'question' => 'question',
            'answer' => 'answer',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => 'The FAQ question is required.',
            'answer.required' => 'The FAQ answer is required.',
        ];
    }
}
