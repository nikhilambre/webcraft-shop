<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seo;
use App\Blogcategor;

class ErrorController extends Controller
{
    public function index()
    {
        $pageName = 'notfound';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','created_at')
                        ->where('categoryStatus', 'ACTIVE')
                        ->orderBy('categoryRank')
                        ->get();
     
        return view('errors.404')->with([
            'seo' => $seo,
            'category' => $category
        ]);
    }
}
