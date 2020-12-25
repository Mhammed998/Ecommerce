<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            "cate_name_en" => 'required|string|min:3|max:1000',
            "cate_name_ar" => 'required|string|min:3|max:1000',
            "cate_desc_en" => 'required|string|min:3',
            "cate_desc_ar" => 'required|string|min:3',
            'cate_image' => 'image|mimes:jpg,png,gif,jpeg|max:2048'
        ];
    }
}
