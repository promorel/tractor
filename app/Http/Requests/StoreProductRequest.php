<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'main_image_url' => 'nullable|url|max:500',
            'characteristics' => 'nullable|string|max:2000',
            'average_price' => 'required|numeric|min:0|max:999999.99',
            'delivery_time' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:2000',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'nom du produit',
            'main_image_url' => 'URL de l\'image principale',
            'characteristics' => 'caractéristiques',
            'average_price' => 'prix moyen',
            'delivery_time' => 'temps de livraison',
            'description' => 'description',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'main_image.required' => 'L\'image principale est obligatoire.',
            'main_image.image' => 'Le fichier doit être une image.',
            'main_image.mimes' => 'L\'image doit être au format: jpeg, jpg, png ou webp.',
            'main_image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'average_price.required' => 'Le prix moyen est obligatoire.',
            'average_price.numeric' => 'Le prix doit être un nombre.',
        ];
    }
}
