<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
            'phone' => 'required | min:6',
            'type' => 'required',
            'email' => 'required | min:6',
            'address' => 'required | min:6',
            'token' => 'required | digits_between:0,9',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'email.required' => 'El email es requerido',
            'email.min' => 'El email debe ser real',
            'phone.required' => 'El teléfono es requerido',
            'phone.min' => 'El teléfono debe ser real',
            'type.required' => 'El tipo de vendedor es requerido',
            'address.required' => 'La dirección es requerida',
            'address.min' => 'La dirección debe ser real',
            'token.required' => 'El PIN es requerido',
            'token.digits_between' => 'El PIN deben ser solo números',
        ];
    }
}
