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
            'images.*' => ['image', 'max:8192'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Пожалуйста, назовите свою публикацию.',
            'latitude.required' => 'Пожалуйста, укажите координаты местности.',
            'longitude.required' => '',
            'images.required' => 'Пожалуйста, загрузите хотя бы одно изображение.',
            'images.*.image' => 'Все загруженные файлы должны быть изображениями.',
            'images.*.max' => 'Максимальный размер файла - 8 МБ.',
        ];
    }
}
