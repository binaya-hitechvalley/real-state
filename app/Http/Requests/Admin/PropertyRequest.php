<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
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
        $propertyId = $this->route('property');

        return [
            'property_type_id' => ['required', 'exists:property_types,id'],
            'business_type_id' => ['required', 'exists:business_types,id'],
            'state_id' => ['required', 'exists:states,id'],
            'municipality_id' => ['nullable', 'exists:municipalities,id'],
            
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('properties')->ignore($propertyId)
            ],
            'description' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric', 'min:0', 'max:999999999999.99'],
            'price_period' => ['required', Rule::in(['total', 'monthly', 'yearly'])],
            'land_area_size' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            
            'status' => ['required', Rule::in(['available', 'sold', 'rented', 'inactive'])],
            'is_featured' => ['boolean'],
            
            // Images
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'primary_image_index' => ['nullable', 'integer'],
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
            'property_type_id' => 'property type',
            'business_type_id' => 'business type',
            'state_id' => 'state',
            'municipality_id' => 'municipality',
            'price_period' => 'price period',
            'land_area_size' => 'land area size',
            'is_featured' => 'featured',
            'images.*' => 'image',
        ];
    }
}
