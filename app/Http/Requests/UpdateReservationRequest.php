<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
//            'mobile_number' => 'required|max:10',
            'mobile_number' => ['required','regex:/(05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})/'],
            'email' => 'required|email',
//            'plate_number' => 'required',
            'plate_number_1' =>'required|regex:/^[\p{Arabic}\s]{5}$/u',
            'plate_number_2' =>'required|digits:4',
            'serial_number' => 'required',
            "reserve_city_id" =>  'required',
            "reserve_center_id" =>  'required',
            "reserve_date" =>  'required',
            "reserve_period" =>  'required',

        ];
    }
}
