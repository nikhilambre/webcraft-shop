<?php

namespace App\Http\Controllers\Templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    public function index($type, $name, $page) 
    {


        return view('theme.'.$type.'.'.$name.'.'.$page)->with([
            'type' => $type,
            'name' => $name,
            'page' => $page,
        ]);
    }
}
