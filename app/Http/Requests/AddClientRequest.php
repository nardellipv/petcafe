<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClientRequest extends FormRequest
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
            'email' => 'required | min:6',
            'phone' => 'required | min:6',
            'address' => 'required | min:6',
            'city_id' => 'required',
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
            'address.required' => 'La dirección es requerida',
            'address.min' => 'La dirección debe ser real',
            'city_id.required' => 'La localidad es requerida',
        ];
    }
}
