<?php

namespace App\Services\DiscountCode;
use App\Models\DiscountCode;


class DiscountCodeService
{
    public function create($dataArray)

    {
        $DiscountCode = DiscountCode::create(array_merge([
               'slug' => uniqid()
            ], $dataArray ));
        return $DiscountCode;
    }

    public function get_valid_discount($discount_code)
    {
        $DiscountCode = DiscountCode::where('code',$discount_code)
        ->where('start_date','<',date("Y-m-d"))
        ->where('end_date','>',date("Y-m-d"))->first();
        return $DiscountCode;
    }



}
