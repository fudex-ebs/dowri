<?php

namespace App\Services\Reservation;

use Hash;
use App\User;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\CapacityModification;
use App\Models\InspectionCenter;
use App\Models\Payment;
use App\Models\DiscountCode;
use App\Models\Discount;
use App\Models\ReservationCancel;
use App\Models\ReservationConfirm;
use Log;
use Carbon\Carbon;
use App\PayTabs\PayTabs;
use App\Services\DiscountCode\DiscountCodeService;

class ReservationService{
    protected $DiscountCodeService;

    public function __construct(DiscountCodeService $DiscountCodeService) {
        $this->DiscountCodeService = $DiscountCodeService;
    }
    public function create($dataArray){

        $user = User::where('email',$dataArray['email'])->first();
        if(!$user){
            $user = User::create([
                'name' => $dataArray['first_name'].' '.$dataArray['last_name'],
                'mobile_number' => $dataArray['mobile_number'],
                'email' => $dataArray['email'],
                'password' => Hash::make('123456'),
                'status' => 'inactive'
            ]);
        }

        $car = Car::where('plate_number',$dataArray['plate_number'])->first();
        if(!$car){
            $car = Car::create([
                    'slug' => uniqid(),
                    'plate_number' => $dataArray['plate_number'],
                    'serial_number' => $dataArray['serial_number'],
                    'car_type_id' => $dataArray['car_type_id'],
                    'manufacture_year' => $dataArray['manufacture_year'],
                    'model' => $dataArray['model'],
                    'register_expire_date' => $dataArray['register_expire_date']
                ]);
        }

        $reservation = Reservation::create([
            'slug' => 'D-'.uniqid(),
            'user_id' => $user->id,
            'car_id' => $car->id,
            'inspection_center_id' => $dataArray['inspection_center_id'],
            'date' => $dataArray['date'],
            'time_period' => $dataArray['time_period']
        ]);

        $discount_code = $this->DiscountCodeService->get_valid_discount($dataArray['discount_code']);
        if($discount_code){
            $discount = Discount::create([
                'reservation_id' => $reservation->id,
                'discount_code_id' => $discount_code->id,
            ]);
        }
        return $reservation;
    }

    public function check_availability($date,$time_period,$inspection_center_id){
        $inspection_center = InspectionCenter::find($inspection_center_id);
        $reservatios_count = $inspection_center->reservations->where('date',$date)->where('time_period',$time_period)->count();

        if( !$this->check_weekend_availability($date,$time_period) ){
          return false;
        }
        if($inspection_center->has_capacity_modifications_at_date($date)){
            if($reservatios_count < $inspection_center->capacity_modifications->where('date',$date)->first()->$time_period){
                return true;
            }
            return false;
        }

        if($reservatios_count < $inspection_center->capacity($date,$time_period)){
          return true;
        }
        return false;

    }

    public function time_period_is_hidden($date,$time_period,$inspection_center_id){
      $inspection_center = InspectionCenter::find($inspection_center_id);
      if($inspection_center->has_capacity_modifications_at_date($date) && $inspection_center->capacity_modifications->where('date',$date)->first()->$time_period == '-1'){
          return true;
      }
      return false;
    }


    public function check_weekend_availability($date,$time_period){
      $my_date = new Carbon($date);
      if($my_date->dayOfWeek == 5){
        return false;
      }
      if( $my_date->dayOfWeek == 6 && !in_array( $time_period , sat_work_hours() ) ){
        return false;

      }
      return true;

    }


    public function get_reservation_by_slug($slug){
        $reservation = Reservation::whereslug($slug)->get()->first();
        return $reservation;
    }

    public function payment(Reservation $reservation){
      $paytabs = new PayTabs();
      $paytabs->set_page_setting('reservation','abs2121','SAR','127.0.0.1','English');
      $paytabs->set_customer($reservation->user->name,$reservation->user->name,'00966',$reservation->user->mobile_number,$reservation->user->email);
      $paytabs->add_item('reservation-'.$reservation->slug,$reservation->car->car_type->price,'1');
      $paytabs->set_address("princ moteb road","Dammam","Dammam","12345","SAU");
      if($reservation->discount){
        $paytabs->set_discount($reservation->discount->discount_code->amount);
      }

      $pay_page = $paytabs->create_pay_page();
      if($pay_page->response_code == 4012){
        $payment = Payment::create([
          'slug' => uniqid(),
          'reservation_id' => $reservation->id,
          'p_id' => $pay_page->p_id
        ]);
        Log::info('payment_url '.$pay_page->payment_url);
        return redirect()->away($pay_page->payment_url);
      }
      return ;
    }

    //
    public function total_sale_number(){
        $total_sale_number = Reservation::where('status','valid')->count();
        return $total_sale_number;
    }

    public function total_sale_value(){
        $total_sale_value = 0;
        $reservations = Reservation::where('status','valid')->get()->all();
        foreach ($reservations as $key => $reservation) {
          $total_sale_value += $reservation->car->car_type->price;
        }
        return $total_sale_value;

    }

    public function total_cancel_number(){
      $total_cancel_number = ReservationCancel::where('status','verified')->count();
      return $total_cancel_number;
    }

    public function reservation_count_for($from_date,$to_date){
      $reservation_number_count = Reservation::whereBetween('date', [$from_date, $to_date])->where('status','valid')->count();
      return $reservation_number_count;
    }
    public function reservation_count_on($from_date,$to_date){
      $reservation_number_count = Reservation::whereBetween('created_at', [$from_date, $to_date])->where('status','valid')->count();
      return $reservation_number_count;
    }

    //Reservation confirm
    public function create_code($reservation){
        $exist = ReservationConfirm::where('reservation_id' ,$reservation->id )->first();
        if(empty($exist)){
            $reservationConfirm = ReservationConfirm::create([
                'slug' => uniqid(),
                'confirm_code' => rand (0,99999),
                'reservation_id' => $reservation->id,
                'status' => 'unverified',
            ]);
        }else{
           $id = ReservationConfirm::where('reservation_id' ,$reservation->id )
                ->update(['confirm_code' => rand (0,99999)]);
           $reservationConfirm = ReservationConfirm::find($id);
        }

        $this->send_confirm_code($reservationConfirm);
        return $reservationConfirm ;
    }
    public function send_confirm_code($reservationConfirm){
        $msg = 'رمز التأكيد هو '.$reservationConfirm->confirm_code;
        $mobile_number = $reservationConfirm->reservation->user->mobile_number;
        SendSms($mobile_number,$msg);
    }


}
