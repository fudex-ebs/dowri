<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' =>'required|email',
            'mobile_number' => ['required','regex:/(05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})/'],
            'content'=>'required|max:255'
        ];
    }
}
