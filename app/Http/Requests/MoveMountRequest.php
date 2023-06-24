<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoveMountRequest extends FormRequest
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
            'mount' => 'required | numeric',
            'comment' => 'required | min:10',
            'payment_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mount.required' => 'El monto es requerido',
            'mount.numeric' => 'El monto debe ser un valor real',
            'comment.required' => 'El motivo es requerido',
            'comment.min' => 'El motivo debe contener más de 10 caracteres',
            'payment_id.required' => 'Seleccione el tipo de movimiento',
        ];
    }
}
