<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ReservationCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function tosList (){
        return view('tos');
    }
    public function policy(){
        return view('policy');
    }
    public function listToc(){
        return view('toc');
    }
    public function test(){
        $str = uniqid();
        $rest = substr($str,0,8);
        $reservation = "test";
        $reservation = Reservation::find(76);
       return  Mail::to('fatmasarhan@fudex.com.sa')
        ->send(new ReservationCreatedMail($reservation));



    }
}
