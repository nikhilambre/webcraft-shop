<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {

    }


    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */

    protected function setCost($currency)
    {
        if ($currency == 'USD'){
            $this->currencyIcon = 'usd';
            $this->costStatic = 76;
            $this->costDynamic = 152;
            $this->costBlog = 76;
            $this->costStore = 152;

        } elseif ($currency == 'INR'){
            $this->currencyIcon = 'inr';
            $this->costStatic = 2999;
            $this->costDynamic = 5999;
            $this->costBlog = 4999;
            $this->costStore = 9999;

        } elseif ($currency == 'EUR') {
            $this->currencyIcon = 'eur';
            $this->costStatic = 70;
            $this->costDynamic = 140;
            $this->costBlog = 76;
            $this->costStore = 152;

        } elseif ($currency == 'GBP') {
            $this->currencyIcon = 'gbp';
            $this->costStatic = 60;
            $this->costDynamic = 122;
            $this->costBlog = 76;
            $this->costStore = 152;

        } else {
            $this->currencyIcon = 'usd';
            $this->costStatic = 76;
            $this->costDynamic = 152;
            $this->costBlog = 76;
            $this->costStore = 152;
        }

        return $this;
    }

    public function index($setCurrency = null)
    {
        $currentIp = geoip()->getLocation()->toArray();

        if ($setCurrency){
            $pageCurrency = $setCurrency;
            $cost = $this->setCost($pageCurrency);
        } else {
            $pageCurrency = $currentIp['currency'];
            $cost = $this->setCost($pageCurrency);
        }

        return view('guest.pricing')->with([
            'currentIp' => $currentIp,
            'currencyIcon' => $cost->currencyIcon,
            'costBuzz' => $cost->costBlog,
            'costStore' => $cost->costStore,
        ]);
    }
}
