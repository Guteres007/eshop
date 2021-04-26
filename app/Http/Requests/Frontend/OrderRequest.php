<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'street' => 'required|regex:/^.*(?=.{4,10})(?=.*\d)(?=.*[a-zA-Z]).*$/',
            'city' => 'required|min:2',
            'postcode' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{9,11}\z/',
            'terms' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Musíte vyplnit',
            'first_name.min' => 'Musí obsahovat alespon dvě písmena',
            'last_name.required' => 'Musíte vyplnit',
            'last_name.min' => 'Musí obsahovat alespon dvě písmena',
            'street.required' => 'Musíte vyplnit',
            'street.regex' => 'Musí obsahovat alesoň jedno číslo',
            'city.required' => 'Musíte vyplnit',
            'city.min' => 'Musí obsahovat alespon dvě písmena',
            'postcode.required' => 'Musíte vyplnit',
            'postcode.numeric' => 'Musí být jen číslo',
            'email.required' => 'Musíte vyplnit',
            'email.email' => 'Špatný fotmát emailu',
            'phone.required' => 'Musíte vyplnit',
            'phone.numeric' =>  'Musí být jen číslo',
            'terms.required' =>  'Musíte udělit souhlas',
        ];
    }
}
