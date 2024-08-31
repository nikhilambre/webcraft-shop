<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageupdatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:pageupdator');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pageupdator');
    }
}
