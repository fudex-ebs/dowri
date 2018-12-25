<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarTypeRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' =>'required',
            'price' => 'required|numeric|min:1',
            'dowri_fee'=>'required|numeric|min:1'
        ];
    }
}
