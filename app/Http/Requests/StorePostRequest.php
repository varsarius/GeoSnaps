<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'latitude' => 'required',
            'longitude' => 'required',
            'images' => 'required',
            'images.*' => ['image', 'max:950000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name_required'),
            'latitude.required' => __('messages.latitude_required'),
            'longitude.required' => '',
            'images.required' => __('messages.images_required'),
            'images.*.image' => __('messages.images_image'),
            'images.*.max' => __('messages.images_max'),
        ];
    }
}
