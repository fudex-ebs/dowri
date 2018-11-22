<?php

namespace App\Services\CapacityModification;
use App\Models\CapacityModification;


class CapacityModificationService
{
    public function store($InspectionCenter,$date,$dataArray)
    {
    	if($InspectionCenter->has_capacity_modifications_at_date($date)){
            $InspectionCenter->capacity_modifications->where('date',$date)->each->delete();
    	}
      $CapacityModification = CapacityModification::create(array_merge([
             'date' => $date,
             'inspection_center_id'=> $InspectionCenter->id
          ], $dataArray ));
      return $CapacityModification;

    }

}
