<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'title' => 'required|max:100',
            'category' => 'required',
            'type' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'latitude' => 'required',
            'longitude' => 'required',
            'image.*' => 'required|image|mimes:jpg,gif,jpeg,bmp,png',
        ];
    }
}
