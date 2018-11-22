<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\InspectionCenter;
use App\Models\Payment;
use App\Models\CarType;
use App\Models\City;
use App\Services\Reservation\ReservationService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use App\Events\ReservationCreated;
use Carbon\Carbon;
use PDF;
use Log;
use App\PayTabs\PayTabs;

class ReservationController extends Controller
{
    protected $ReservationService;

    public function __construct(ReservationService $ReservationService) {
        $this->ReservationService = $ReservationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservations = Reservation::all();
      return view('admin.reservations2',['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $InspectionCenters = InspectionCenter::all();
        $cities = City::all();
        return view('temp.home',['InspectionCenters' => $InspectionCenters,'cities' => $cities]);
    }
    public function check($center_id,$date){
      return view('temp.search_result',['center_id' => $center_id ,'date' => $date,'ReservationService' => $this->ReservationService]);
    }
    public function reserve($center_id,$date,$time_period){
      $car_types = CarType::all();
      return view('temp.reserve',['center_id' => $center_id ,'date' => $date,'time' =>$time_period,'car_types' => $car_types ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request,$center_id,$date,$time_period)
    {
        if( $this->ReservationService->check_availability($date,$time_period,$center_id) ){
          $dataArray = array_merge($request->all(),['date' => $date,'time_period' =>$time_period,'inspection_center_id' => $center_id]);
          $reservation = $this->ReservationService->create($dataArray);
          return $this->ReservationService->payment($reservation);

        }
        return redirect()->back()->with('status','reservation unsuccessful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function cancel_reservation()
    {
        return view('reservation.cancel.cancel_request');
    }

    public function cancel_reservation_request(Request $request)
    {
        return view('reservation.cancel.cancel_request');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function download(Reservation $Reservation)
    {
        $pdf = PDF::loadView('pdf.ticket',['reservation' => $Reservation]);
        return $pdf->download('ticket.pdf');
    }
    public function print(Reservation $Reservation)
    {
        $pdf = PDF::loadView('pdf.ticket',['reservation' => $Reservation]);
        return $pdf->stream('ticket.pdf');
    }

    public function show(Reservation $Reservation)
    {
        if($Reservation->valid()){
          return view('temp.success',['reservation' => $Reservation]);
        }
        return redirect()->back()->with('status','reservation not valid');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */


    public function check_availability(Request $request)
    {
        if( $this->ReservationService->check_availability($request->get('date'),$request->get('time_period'),$request->get('inspection_center_id')) ){
          return 'availabe';
        }
        return 'not_availabe';

    }

    public function test()
    {

      var_dump(in_array( 'p_8_30' , sat_work_hours() ));
      return sat_work_hours();


    }

    public function paytabs_respond(Request $request)
    {
      $paytabs= new PayTabs();
	    $payment_varification = $paytabs->verify_payment($request->get('payment_reference'));
      if($payment_varification->response_code == '100'){
        $payment = Payment::where( 'p_id',$request->get('payment_reference') )->first();
        $payment->update(['status' => 'paid']);
        $payment->reservation->update(['status' => 'valid']);
        event(new ReservationCreated($payment->reservation));
        return redirect()->route('reservation.show',['reservation' => $payment->reservation]);
      }
      return redirect()->route('home')->with('status', 'payment_faild');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $reservation = $this->ReservationService->get_reservation_by_slug($request->get('reservation_number'));
        if($reservation){
          return redirect()->route('reservation.show',['Reservation' => $reservation]);
        }
        return redirect()->back()->with('status','reservation not found');
    }

}
