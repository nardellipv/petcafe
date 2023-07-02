<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ShopProfileRequest extends FormRequest
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
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        return [
            'name' => 'required | min:5',
            'phone' => 'required | min:6',
            'payment_id' => 'required',
            'address' => 'required | min:6',
            'city_id' => 'required',
            'about' => 'required | min:10',
            'web' => 'without_spaces',
            'instagram' => 'without_spaces',
            'facebook' => 'without_spaces',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'phone.required' => 'El teléfono es requerido',
            'phone.min' => 'El teléfono debe ser real',
            'payment_id.required' => 'Debe seleccionar al menos una forma de pago',
            'address.required' => 'La dirección es requerida',
            'address.min' => 'La dirección debe ser real',
            'city_id.required' => 'La localidad es requerida',
            'about.required' => 'El campo sobre tu tienda es requerido',
            'about.min' => 'Ingresa algo más real sobre tu tienda',
            'web.without_spaces' => 'La dirección web no tiene que poseer espacios en blanco',
            'instagram.without_spaces' => 'El usuario de instagram no tiene que poseer espacios en blanco',
            'facebook.without_spaces' => 'La dirección de facebook no tiene que poseer espacios en blanco',
        ];
    }
}
