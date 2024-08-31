<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('guest.feature');
    }

    public function details()
    {
        return view('guest.feature-detail');
    }

    public function cmsDetails()
    {
        return view('guest.feature-cms');
    }
}
