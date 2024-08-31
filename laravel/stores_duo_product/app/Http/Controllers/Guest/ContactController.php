<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('guest.contact');
    }

    public function contact()
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }
}
