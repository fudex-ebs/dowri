<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
        // 'name' => 'required|max:255',
        // 'mobile_number' => 'required|regex:^(05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$',
        // 'email' => 'required|email',
        // 'plate_number' => 'required',
        // 'serial_number' => 'required',
      ];
    }

    public function messages()
   {
       return [
           'name.required' => 'name is required!',
           'mobile_number.required' => 'mobile_number is required!',
           'password.required' => 'Password is required!',
           'email.required' => 'email is required!',
           'plate_number.required' => 'plate_number is required!',
           'serial_number.required' => 'serial_number is required!',
           'tos_agree.required' => 'tos_agree is required!',
       ];
   }
}
