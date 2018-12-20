<?php

namespace App\Http\Controllers;

use App\Models\ReservationConfirm;
use App\Services\Reservation\ReservationCancelService;

use App\Models\Reservation;
use App\Models\ReservationCancel;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ReservationCancelController extends Controller
{
    protected $ReservationCancelService;

    public function __construct(ReservationCancelService $ReservationCancelService) {
        $this->ReservationCancelService = $ReservationCancelService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function create($reservation_slug)
    {
      $reservation = Reservation::whereslug( $reservation_slug )->first();
      $current_date = Carbon::now() ;
      $reservation_date = new Carbon($reservation->date);
      $hour_diff = round((strtotime($reservation_date) - strtotime($current_date))/3600, 1);
        if($hour_diff <= 24){
            return redirect()->back()->with('cancel','إلغاء عمليه الحجز غير مفعله  ');

        }else{
            if($reservation && $reservation->valid()){
                $reservation_cancel = $this->ReservationCancelService->create($reservation);
                return redirect()->route('reservation.cancel_verify', ['ReservationCancel' => $reservation_cancel]);
            }
            return redirect()->back()->with('status','reservation not valid');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservationCancel  $reservationCancel
     * @return \Illuminate\Http\Response
     */
     public function verify(ReservationCancel $ReservationCancel)
     {
         return view('temp.cancel_request_varify',['ReservationCancel' => $ReservationCancel]);
     }

    public function post_verify(Request $request,$slug)
    {
        $reservation_cancel = ReservationCancel::whereslug( $slug )->first();
        if($reservation_cancel && $reservation_cancel->varify_code == $request->get('verify_code')){
          $reservation_cancel->update(['status' => 'verified']);
          $reservation_cancel->reservation->update(['status' => 'in_valid']);
          return redirect()->route('home')->with('status','your reservation has been canceled');
        }
        return redirect()->back()->with('status','your entered wrong code please try again');
    }
    public function cancel_reserve($slug)
    {
        $reservation = Reservation::whereslug( $slug )->first();
//        return $reservation ;
        if($reservation){
            $current_date = Carbon::now() ;
            $reservation_date = new Carbon($reservation->date);
            $hour_diff = round((strtotime($reservation_date) - strtotime($current_date))/3600, 1);
            if($hour_diff <= 24){
                return redirect()->back()->with('cancel','إلغاء عمليه الحجز غير مفعله  ');
            }else{
                $check_confirm = ReservationConfirm::where('reservation_id' , $reservation->id)->first();
                if($check_confirm && $check_confirm->status == "verified"){
                    $reservation->update(['status' => 'in_valid']);
                    //send sms
                    $res = $this->ReservationCancelService->send_cancel_sms($reservation);
//                    return $res;
                    return redirect()->route('home')->with('cancel_done','your reservation has been canceled');
                }else{
                    return redirect()->back()->with('cancel','إلغاء عمليه الحجز غير مفعله  ');
                }
            }
        }else{
            return redirect()->route('home')->with('status','no reservation ');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservationCancel  $reservationCancel
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationCancel $reservationCancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservationCancel  $reservationCancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationCancel $reservationCancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservationCancel  $reservationCancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationCancel $reservationCancel)
    {
        //
    }
}