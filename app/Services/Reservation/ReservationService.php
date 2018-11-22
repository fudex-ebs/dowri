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


}
