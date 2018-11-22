<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function dashboard(){
      return view('admin.dashboard');
    }

    public function user_index(){
      $users = User::where('role','customer')->get();
      return view('admin.user.index',['users' => $users]);
    }
}
