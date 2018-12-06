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
             'mobile_number' => 'required|max:10',
             'email' => 'required|email',
             'plate_number' => 'required',
             'serial_number' => 'required',
            "reserve_city_id" =>  'required',
            "reserve_center_id" =>  'required',
            "reserve_date" =>  'required',
            "reserve_period" =>  'required',

        ];
    }
}
