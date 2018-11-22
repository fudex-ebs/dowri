<?php

namespace App\Http\Controllers;

use App\Services\Inspection\InspectionCenterService;
use Illuminate\Http\Request;
use App\Models\InspectionCenter;
use App\Models\City;

class InspectionCenterController extends Controller
{
    protected $InspectionCenterService;


    public function __construct(InspectionCenterService $InspectionCenterService) {
        $this->InspectionCenterService = $InspectionCenterService;
    }

    public function index()
    {
        $cities = City::all();
        $inspection_centers = $this->InspectionCenterService->get_all();
        return view('admin.inspection_center.index',['inspection_centers' => $inspection_centers,'cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->InspectionCenterService->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InspectionCenter  $inspectionCenter
     * @return \Illuminate\Http\Response
     */
    public function show(InspectionCenter $inspectionCenter)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InspectionCenter  $inspectionCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(InspectionCenter $inspectionCenter)
    {
        $cities = City::all();
        return view('admin.inspection_center.edit',['inspection_center' => $inspectionCenter,'cities' => $cities]);
    }

    public function upload_ad(Request $request, InspectionCenter $inspectionCenter)
    {
        if($request->hasFile('photo')){
          $img_name = $this->InspectionCenterService->upload_ad($request->file('photo'));
          $inspectionCenter->update(['ad_img' => $img_name]);
          return redirect()->back()->with('status','photo uploaded');
        }
        return redirect()->back()->with('status','no photo');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InspectionCenter  $inspectionCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspectionCenter $inspectionCenter)
    {
      $inspectionCenter->update($request->all());
      if($request->hasFile('photo')){
        $img_name = $this->InspectionCenterService->upload_ad($request->file('photo'));
        $inspectionCenter->update(['ad_img' => $img_name]);
      }
      return redirect()->back()->with('status','center updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InspectionCenter  $inspectionCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspectionCenter $inspectionCenter)
    {
        //
    }
}
