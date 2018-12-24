<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\User;
use App\Services\Reservation\ReservationService;
use DB;

class AdminController extends Controller
{
    protected $ReservationService;
    
    public function __construct(ReservationService $ReservationService) {
        $this->ReservationService = $ReservationService;
    }
    public function dashboard(){
      return view('admin.dashboard',['ReservationService' => $this->ReservationService]);
    }

    public function user_index(){
      $users = User::where('role','customer')->get();
      return view('admin.user.index',['users' => $users]);
    }
    public function setting(){
        $cols  =  DB::getSchemaBuilder()->getColumnListing('settings');
        foreach ($cols as $key => $col ){
            if(in_array($col, ['id' ,'created_at', 'updated_at'])){
                unset ($cols[$key]);
            }
        }
        $setting = Setting::first();
        if($setting){
            $fee = $setting ;
        }else{
            $fee = [];
        }
//        return $setting ;
        return view('admin.setting.index' ,['cols' => $cols , 'setting'=> $fee]);

    }
    public function setting_update(Request $request ,$id = null){
        $data = $request->except('_token') ;
        foreach ($data as $key => $filed){
            $request->validate([
                $key => 'required|numeric|min:1',

            ]);
        }
//        return $id;
        if($id){
//            $id  = $request->get('id') ;
            $setting = Setting::find($id);
            $setting->update($data);
        }else{
            Setting::create($data);
        }

        return redirect()->route('setting.index')->with('status','Website setting updated');
    }

}
