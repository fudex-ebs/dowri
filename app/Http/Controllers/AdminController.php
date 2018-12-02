<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services\Reservation\ReservationService;

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
}
