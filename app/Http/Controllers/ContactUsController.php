<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest ;

class ContactUsController extends Controller
{
    public function index (){
        return view ('contact_us');
    }
    public function store(ContactUsRequest $request){
        $data =  $request->all();
        ContactUs::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'mobile_number'     => $data['mobile_number'],
            'content'           => $data['content']
        ]);
        return redirect()->back()->with('contact' , 'send your contact message');

    }
}
