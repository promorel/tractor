<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'brand_ids' => 'required|array|min:1',
            'brand_ids.*' => 'required|exists:brands,id',
            'product_id' => [
                'required',
                'exists:products,id',
                function ($attribute, $value, $fail) {
                    $product = \App\Models\Product::find($value);
                    if ($product && $product->brands()->count() >= 18) {
                        $fail('Ce produit a déjà atteint la limite de 18 marques.');
                    }
                },
            ],
            'price' => 'nullable|numeric|min:0|max:999999.99',
            'stock' => 'required|integer|min:0',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'brand_id' => 'marque',
            'product_id' => 'produit',
            'price' => 'prix',
            'stock' => 'stock',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'brand_ids.required' => 'Veuillez sélectionner au moins une marque.',
            'brand_ids.array' => 'La sélection des marques est invalide.',
            'brand_ids.min' => 'Veuillez sélectionner au moins une marque.',
            'brand_ids.*.exists' => 'Une ou plusieurs marques sélectionnées n\'existent pas.',
            'product_id.required' => 'Veuillez sélectionner un produit.',
            'product_id.exists' => 'Le produit sélectionné n\'existe pas.',
            'logo.required' => 'Le logo de la marque est obligatoire.',
            'logo.image' => 'Le fichier doit être une image.',
            'logo.mimes' => 'Le logo doit être au format: jpeg, jpg, png ou webp.',
            'logo.max' => 'Le logo ne doit pas dépasser 2 Mo.',
        ];
    }
}
