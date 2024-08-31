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
            $this->currencyIcon = 'dollar-sign';
            $this->cost3600 = 5;
            $this->cost5000 = 7.5;
            $this->cost6000 = 9;
            $this->cost8000 = 11;
            $this->cost9000 = 12;
            $this->cost10000 = 14;
            $this->cost12000 = 17;
            $this->cost18000 = 25;

        } elseif ($currency == 'INR'){
            $this->currencyIcon = 'rupee-sign';
            $this->cost3600 = 299;
            $this->cost5000 = 419;
            $this->cost6000 = 499;
            $this->cost8000 = 666;
            $this->cost9000 = 749;
            $this->cost10000 = 833;
            $this->cost12000 = 999;
            $this->cost18000 = 1499;

        } elseif ($currency == 'EUR') {
            $this->currencyIcon = 'euro-sign';
            $this->cost3600 = 4.55;
            $this->cost5000 = 5.69;
            $this->cost6000 = 6.82;
            $this->cost8000 = 9.10;
            $this->cost9000 = 10.24;
            $this->cost10000 = 11.37;
            $this->cost12000 = 13.65;
            $this->cost18000 = 20.47;

        } elseif ($currency == 'GBP') {
            $this->currencyIcon = 'pound-sign';
            $this->cost3600 = 4;
            $this->cost5000 = 5;
            $this->cost6000 = 6;
            $this->cost8000 = 8;
            $this->cost9000 = 9;
            $this->cost10000 = 10;
            $this->cost12000 = 12;
            $this->cost18000 = 18;

        } else {
            $this->currencyIcon = 'dollar-sign';
            $this->cost3600 = 5;
            $this->cost5000 = 7.5;
            $this->cost6000 = 8.4;
            $this->cost8000 = 10.4;
            $this->cost9000 = 11.5;
            $this->cost10000 = 13;
            $this->cost12000 = 15;
            $this->cost18000 = 23;
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

        //  Page data
        $pageData = ([
            'pageCurrency' => $pageCurrency,
            'currencyIcon' => $cost->currencyIcon,
            'cost3600' => $cost->cost3600,
            'cost5000' => $cost->cost5000,
            'cost6000' => $cost->cost6000,
            'cost8000' => $cost->cost8000,
            'cost9000' => $cost->cost9000,
            'cost10000' => $cost->cost10000,
            'cost12000' => $cost->cost12000,
            'cost18000' => $cost->cost18000
        ]);

        return view('guest.pricing')->with([
            'pageData' => $pageData,
        ]);
    }

    public function details()
    {
        return view('guest.pricing-detail');
    }

    public function getCustomOrder()
    {
        return view('guest.order-custom');
    }
}
