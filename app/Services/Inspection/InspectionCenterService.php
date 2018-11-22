<?php

namespace App\Services\Inspection;
use App\Models\InspectionCenter;


class InspectionCenterService
{
    public function create($dataArray)
    {
        $inspection_center = InspectionCenter::create(array_merge([
               'slug' => uniqid(),
            ], $dataArray ));
        return $inspection_center;
    }

    public function upload_ad($image)
    {
        $photoName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('adds'), $photoName);
        return $photoName;
    }


    public function get_all()
    {
        $inspection_centers = InspectionCenter::all();
        return $inspection_centers;
    }
}
