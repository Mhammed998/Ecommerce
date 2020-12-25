<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_en'=>'required|string|min:3|max:200',
            'name_ar'=>'required|string|min:3|max:200',
            'description_en'=>'required|string|min:10|max:400',
            'description_ar'=>'required|string|min:10|max:400',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'brand'=>'required|string|min:2|max:100',
            'size'=>'required',
            'colors'=>'required',
            'quantity'=>'required|numeric',
            'main_image'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'sub_images.*'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'status'=>'required',
        ];
    }
}
