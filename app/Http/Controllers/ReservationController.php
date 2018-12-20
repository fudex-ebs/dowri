<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\InspectionCenter;
use App\Models\Payment;
use App\Models\CarType;
use App\Models\City;
use App\Models\ReservationConfirm;
use App\Models\PaymentConfirm;
use App\Services\Reservation\ReservationService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Events\ReservationCreated;
use Carbon\Carbon;
use PDF;
use Log;
use App\PayTabs\PayTabs;
use Session;


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
    //   $reservations = Reservation::all();
          $reservations = Reservation::where('status','valid')->get();

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
        $cars = CarType::all();
        return view('temp.home',['InspectionCenters' => $InspectionCenters,'cities' => $cities ,'cars'=>$cars]);
    }
    public function check($center_id,$date ,$car){
        Session::put('car_id' , $car);
        if(date_is_friday($date)){
                return redirect()->back()->with('status','friday not avalble');
        }
        $today = Carbon::today();
        if($date < $today){
            return redirect()->back()->with('status','friday not avalble');
        }
//      return $date ;
      if(date_is_sat($date)){
          $is_sat = "true";
      }else{
          $is_sat = "false";
      }
//      return $is_sat;
      return view('temp.search_result',['center_id' => $center_id ,'date' => $date,'ReservationService' => $this->ReservationService , "is_sat" =>$is_sat]);
    }
    public function reserve($center_id,$date,$time_period ){
        $car_types = CarType::all();
        $car_id = Session::get('car_id');
        $selected_car = CarType::find($car_id);
      return view('temp.reserve',['center_id' => $center_id ,'date' => $date,'time' =>$time_period,'car_types' => $car_types ,'selected_car'=>$selected_car]);
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
          $car_id = Session::get('car_id');
          $dataArray = array_merge($request->all(),['date' => $date,'time_period' =>$time_period,'inspection_center_id' => $center_id ,'car_type_id'=>$car_id]);
          $reservation = $this->ReservationService->create($dataArray);
          $payment_confirm = $this->ReservationService->payment_code($reservation);
            if($payment_confirm){
                return redirect()->route('reservation.create_payment_code',['PaymentConfirm' => $payment_confirm]);
            }
        //   return $this->ReservationService->payment($reservation);

        }
        return redirect()->back()->with('time_status','reservation unsuccessful');

    }
    
    public function confirm_payment_page($id)
    {
        $payment_confirm = PaymentConfirm::find($id);
        return view('temp.payment_code',['PaymentConfirm' => $payment_confirm]);
    }
    
    public function payment_confirm (Request $request ,$id){
        $payment_confirm = PaymentConfirm::find($id);
        if($payment_confirm && $payment_confirm->confirm_code == $request->verify_code){
            $payment_confirm->update(['status' => 'verified']);
            $reservation  = Reservation::where('id' , $payment_confirm->reservation_id)->first();
            return $this->ReservationService->payment($reservation);
        }else{
            return view('temp.payment_code',['error' => "كود التفعيل غير صحيح" ,'PaymentConfirm' => $payment_confirm]);

        }
//        return $reservation_confirm ;
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
        if(isset($Reservation->inspection_center->ad_img)){
            $path = public_path()."/adds/" . $Reservation->inspection_center->ad_img;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $Reservation->img_code = $base64;
        }


        $pdf = PDF::loadView('pdf.ticket',['reservation' => $Reservation ]);
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
//            return $reservation;
//            $exist = ReservationConfirm::where('reservation_id',$reservation->id)->first();
//            if(!empty($exist) && $exist->status == "verified"){
//                  return redirect()->route('reservation.show',['Reservation' => $reservation]);

//            }else{
                $reservation_confirm = $this->ReservationService->create_code($reservation);
                // return $reservation_confirm ;
                if($reservation_confirm){
//                    return view('temp.confirm_code',['ReservationConfirm' => $reservation_confirm]);
                    return redirect()->route('reservation.create_confirm_code',['ReservationConfirm' => $reservation_confirm]);
                }
//            }

        }
        return redirect()->back()->with('search_status','reservation not found');
    }

    public  function confirm_page($id){
//
        $reservation_confirm = ReservationConfirm::find($id);
        return view('temp.confirm_code',['ReservationConfirm' => $reservation_confirm]);
    }
    public function confirm (Request $request ,$id){
            $reservation_confirm = ReservationConfirm::find($id);
        if($reservation_confirm && $reservation_confirm->confirm_code == $request->verify_code){
            $reservation_confirm->update(['status' => 'verified']);
            $reservation  = Reservation::where('id' , $reservation_confirm->reservation_id)->first();
            return redirect()->route('reservation.show',['Reservation' => $reservation]);
        }else{
            return view('temp.confirm_code',['error' => "كود التفعيل غير صحيح" ,'ReservationConfirm' => $reservation_confirm]);

        }
//        return $reservation_confirm ;
    }
    
     public function  edit($slug){
        $reservation = Reservation::whereslug($slug)->first();
        if($reservation){
            $current_date = Carbon::now() ;
            $reservation_date = new Carbon($reservation->date);
            $hour_diff = round((strtotime($reservation_date) - strtotime($current_date))/3600, 1);
            if($hour_diff <= 24){
                return redirect()->back()->with('cancel_update','تعديل عمليه الحجز غير مفعله  ');
            }else{
                //
                $car_types = CarType::all();
                $cities = City::all();
                $centers = InspectionCenter::all();
                $date = $reservation->date ;
                // if(date_is_sat($date)){
                //     $periods = sat_work_hours();
                // }else{
                //     $periods = get_time_periods();
                // }
                // $new_periods = [];
                // foreach ($periods as $period){
                //     if($period == $reservation->time_period ){
                //         array_push($new_periods, $period) ;
                //     }else{
                //         $result = $this->ReservationService->check_availability($date,$period,$reservation->inspection_center_id);
                //         if($result == true){
                //             array_push($new_periods, $period) ;
                //         }
                //     }

                // }
//                return count($new_periods) ;
                $new_periods = get_time_periods();
                return view('reservation.edit',['reservation' => $reservation ,"car_types" => $car_types ,'cities'=>$cities,'centers'=>$centers ,'periods'=>$new_periods]);
            }

        }
        return redirect()->back()->with('status','reservation not found');


    }
    public function update($slug ,UpdateReservationRequest $request ){
//        return $request->all();
        $reservation = Reservation::whereslug($slug)->first();
        $data = $request->all();
        $reservation_update = $this->ReservationService->update($reservation,$data);
        if( $reservation_update){
            Session::put('update' , 'update done');
            return redirect()->route('reservation.show',['Reservation' => $reservation ]);

        }
        return redirect()->back()->with('status','reservation not found');
    }

}
