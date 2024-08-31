<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seo;
use App\Categor;

class ErrorController extends Controller
{
    public function index()
    {
        $pageName = 'NOTFOUND';
        $seo = Seo::GetForPagename($pageName)->get();

        $categoryList = Categor::select('id','categoryName','categoryNameSlug')
                                ->where('categoryStatus', 'ACTIVE')
                                ->get();
     
        return view('errors.404')->with([
            'seo' => $seo,
            'categoryList' => $categoryList
        ]);
    }
}
