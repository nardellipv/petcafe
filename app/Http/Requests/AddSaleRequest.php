<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSaleRequest extends FormRequest
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
            'quantity' => 'required | numeric',
            'sellPrice' => 'numeric',
            'product_id' => 'required | numeric',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'La cantidad es un campo requerido',
            'quantity.numeric' => 'La cantidad del producto debe ser un número',
            'sellPrice.numeric' => 'El precio debe ser un número',
            'product_id.required' => 'Surgio un error con el ID del producto al tratar de generar la venta',
            'product_id.numeric' => 'Surgio un error con el ID del producto al tratar de generar la venta', 
        ];
    }
}
