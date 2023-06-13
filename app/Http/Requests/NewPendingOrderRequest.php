<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPendingOrderRequest extends FormRequest
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
            'provider_id' => 'required',
            'quantity' => 'required | numeric',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'La cantidad es requerida',
            'quantity.numeric' => 'La cantidad debe ser un número',
        ];
    }
}
