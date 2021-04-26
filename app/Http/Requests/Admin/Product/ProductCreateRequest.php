<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric',
            'shopping_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=700,min_height=700,max_width=1400,max_height=1400',
        ];
    }
}
