<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use URL;

class LanguageController extends Controller
{
    //
    public function switchLang($lang ,Request $request)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
//        dd($request->route());
        return Redirect::back();
    }
}
