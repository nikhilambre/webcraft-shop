<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function dashboard()
    {
        return view('guest.dashboard');
    }

    public function dashboardDetails()
    {
        return view('guest.dashboard-detail');
    }
}
