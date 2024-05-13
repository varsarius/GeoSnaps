<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:255'],
            'description' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'images' => 'nullable',
            'images.*' => ['image', 'max:950000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name_required'),
            'images.*.image' => __('messages.images_image'),
            'images.*.max' => __('messages.images_max'),
        ];
    }
}
