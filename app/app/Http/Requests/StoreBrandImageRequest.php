<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandImageRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'image_urls' => 'required|array|min:1|max:6',
            'image_urls.*' => 'nullable|url|max:500',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'image_urls' => 'URLs des images',
            'image_urls.*' => 'URL de l\'image',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'image_urls.required' => 'Veuillez fournir au moins une URL d\'image.',
            'image_urls.max' => 'Vous ne pouvez ajouter que 6 images maximum à la fois.',
            'image_urls.*.url' => 'Chaque URL doit être valide.',
            'image_urls.*.max' => 'Chaque URL ne doit pas dépasser 500 caractères.',
        ];
    }
}
