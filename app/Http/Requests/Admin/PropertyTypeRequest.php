<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $propertyTypeId = $this->route('property_type');

        return [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('property_types', 'name')->ignore($propertyTypeId),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('property_types', 'slug')->ignore($propertyTypeId),
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'property type name',
            'slug' => 'slug',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The property type name is required.',
            'name.unique' => 'This property type name already exists.',
            'slug.unique' => 'This slug already exists.',
        ];
    }
}
