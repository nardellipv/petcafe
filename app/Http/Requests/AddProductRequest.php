<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
        return [
            'name' => 'required | min:5',
            'description' => 'required | min:10',
            'provider_id' => 'required | numeric',
            'internalCode' => 'nullable | numeric', 
            'buyPrice' => 'required',
            'sellPrice' => 'required',
            'image' => 'nullable | mimes:jpeg,jpg,png,gif | max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'description.required' => 'La descripcion es requerida',
            'provider_id.required' => 'El Proveedor es requerido',
            'provider_id.numeric' => 'El Proveedor es requerido',
            'internalCode.numeric' => 'El código de Producto debe ser un número',
            'descripcion.min' => 'La descripción debe ser real',
            'buyPrice.required' => 'El Precio de Costo es requerido',
            'sellPrice.required' => 'El Precio de Venta es requerido',
            'image.required' => 'La Imagen es requerida',
            'image.max' => 'La foto debe ser menor a 1MB',
        ];
    }
}
