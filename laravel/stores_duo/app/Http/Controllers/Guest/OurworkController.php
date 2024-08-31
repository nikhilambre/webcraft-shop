<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurworkController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('guest.coming-soon');
    }

    public function getServices()
    {
        return view('guest.coming-soon');
    }

    public function getHowDoIt()
    {
        return view('guest.coming-soon');
    }

    public function getComingSoon()
    {
        return view('guest.coming-soon');
    }
}
