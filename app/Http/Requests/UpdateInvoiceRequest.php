<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'payment' => 'required',
            'client_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'payment.required' => 'La forma de pago es requerida',
            'client_id.required' => 'Debe elegir una opcion en el combo cliente',
        ];
    }
}
