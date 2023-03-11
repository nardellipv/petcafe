<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProviderRequest extends FormRequest
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
            'phone' => 'nullable | numeric | min:5',
            'phone2' => 'nullable | numeric | min:5',
            'email' => 'nullable | email | min:5',
            'address' => 'nullable | min:5',
            'comment' => 'nullable | min:5 | max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'phone.numeric' => 'El teléfono principal debe contener solo números',
            'phone.min' => 'El teléfono principal debe ser real',
            'phone2.numeric' => 'El teléfono secundario debe contener solo números',
            'phone2.min' => 'El teléfono secundario debe ser real',
            'email.email' => 'Error al ingresar el email',
            'email.min' => 'El email debe ser real',
            'address.min' => 'La dirección debe ser real',
            'comment.min' => 'El comentario debe ser largo',
            'comment.max' => 'El comentario no debe contener mas de 255 caracteres',
        ];
    }
}
