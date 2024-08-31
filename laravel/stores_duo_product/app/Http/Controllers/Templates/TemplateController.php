<?php

namespace App\Http\Controllers\Templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Template;
use App\Orderfavorite;
use Auth;
use DB;
use URL;

class TemplateController extends Controller
{
    public function showPage()
    {
        return view('guest.template');
    }

    public function index($view, $type, $typeId, $subType) 
    {

        //  Data of template 
        $template = Template::select('id','type','typeId','subType','typeName','typeDescription','htmlContent','customStyle','vendorStyle','fonts','vendorScripts','scripts','created_at')
                        ->where('type', '=', $type)
                        ->where('typeId', '=', $typeId)
                        ->where('subType', '=', $subType)
                        ->get();
        $template = json_decode($template);


        //  selection status of template for this logged in user
        if (Auth::guard('customer')->check()) {

            $id = Auth::guard('customer')->id();

            //  Get all selected components of this customer
            $selections = DB::table('orderfavorites')->select('id','customerId','type','typeId','subType','typeName')
                            ->where('customerId', $id)
                            ->get();

            $selections = json_decode($selections);

            //  If following count is > 1 then component is already added to favorites
            $addedFavorite = DB::table('orderfavorites')
                                ->where('customerId', $id)
                                ->where('type', '=', $type)
                                ->where('typeId', '=', $typeId)
                                ->where('subType', '=', $subType)
                                ->count();
        } else {
            $addedFavorite = null;
            $selections = null;
        }

        return view('templates.demo-'.$view)->with([
            'view' => $view,
            'template' => $template,
            'type' => $type,
            'typeId' => $typeId,
            'subType' => $subType,
            'addedFavorite' => $addedFavorite,
            'selections' => $selections
        ]);
    }

    public function getIframeData($view, $type, $typeId, $subType)
    {
        //  Data of template 
        $iframetemp = Template::select('id','type','typeId','subType','typeName','typeDescription','htmlContent','customStyle','vendorStyle','fonts','vendorScripts','scripts','created_at')
                            ->where('type', '=', $type)
                            ->where('typeId', '=', $typeId)
                            ->where('subType', '=', $subType)
                            ->get();

        $iframetemp = json_decode($iframetemp);

        return view('templates.demo-iframe-'.$view)->with([
            'iframetemp' => $iframetemp,
        ]);
    }

    public function ajaxFavorite(Request $request) 
    {
        $customerId = $request->input('customerId');
        $type = $request->input('type');
        $typeId = $request->input('typeId');
        $subType = $request->input('subType');
        $typeName = $request->input('typeName');

        try{
            Orderfavorite::updateOrCreate(
                ['customerId' => $customerId, 'type' => $type, 'typeId' => $typeId, 'subType' => $subType],
                ['typeName' => $typeName]
            );
        }
        catch(Exception $e) {
            return "Something went wrong, Can't Add to Favorites.!";
        }
        return "It's added to your Favorites.!";
    }
}
