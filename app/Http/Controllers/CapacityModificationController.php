<?php

namespace App\Http\Controllers;

use App\Services\CapacityModification\CapacityModificationService;
use Illuminate\Http\Request;
use App\Models\InspectionCenter;

class CapacityModificationController extends Controller
{
    protected $CapacityModificationService;


    public function __construct(CapacityModificationService $CapacityModificationService) {
        $this->CapacityModificationService = $CapacityModificationService;
    }


    public function create($inspection_center_id,$date)
    {

        $inspection_center = InspectionCenter::find($inspection_center_id);
        return view('admin.capacity_modification.create',['inspection_center' => $inspection_center,'date' => $date]);

    }


    public function store(Request $request,$inspection_center_id,$date)
    {
        $inspection_center = InspectionCenter::find($inspection_center_id);
        $this->CapacityModificationService->store($inspection_center,$date,$request->except('_token'));
        return redirect()->route('inspection_center.edit',$inspection_center->id);
    }
}
