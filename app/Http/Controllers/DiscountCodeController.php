<?php

namespace App\Http\Controllers;


use App\Services\DiscountCode\DiscountCodeService;
use Illuminate\Http\Request;
use App\Models\DiscountCode;
use App\Http\Requests\CreateCodeRequest;

class DiscountCodeController extends Controller
{
    protected $DiscountCodeService;

    public function __construct(DiscountCodeService $DiscountCodeService) {
        $this->DiscountCodeService = $DiscountCodeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DiscountCodes = DiscountCode::all();
        return view('admin.discount_code.index',['codes' => $DiscountCodes]);
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
    public function store(CreateCodeRequest $request)
    {
        $this->DiscountCodeService->create($request->all());
        return redirect()->back()->with('status','code added');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountCode $DiscountCode)
    {
        return view('admin.discount_code.edit',['discount_code' => $DiscountCode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCodeRequest $request, DiscountCode $DiscountCode)
    {
        $res=$DiscountCode->update($request->all());

        return redirect()->route('DiscountCode.index')->with('status','Discount code updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountCode $DiscountCode)
    {
        $DiscountCode->delete();
        return redirect()->back()->with('status','Discount code deleted');
    }
}
