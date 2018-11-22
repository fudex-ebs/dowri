<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $car_types = CarType::all();
      return view('admin.car_type.index',['car_types' => $car_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      CarType::create($request->all());
      return redirect()->back()->with('status','CarType added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function show(CarType $carType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function edit(CarType $carType)
    {
        return view('admin.car_type.edit',['car_type' => $carType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarType $carType)
    {
        $carType->update($request->all());
        return redirect()->route('car_type.index')->with('status','car type updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarType $carType)
    {
      $carType->delete();
      return redirect()->back()->with('status','car type deleted');
    }
}
