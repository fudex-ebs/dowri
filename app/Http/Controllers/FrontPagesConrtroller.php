<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPagesConrtroller extends Controller
{
    public function home(){
      return view('temp.home');
    }
}
