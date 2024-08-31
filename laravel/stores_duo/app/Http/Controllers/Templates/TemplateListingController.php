<?php

namespace App\Http\Controllers\templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Template;
use App\Orderfavorite;
use Auth;
use DB;

class TemplateListingController extends Controller
{

    public function index($view, $type, $subType = null) 
    {

        /*
        *   To Render all first options of a type where to select single option we asked to select subType = 1
        *   Called from - Layout-list-XXX
        */

        //  Data of template Designs
        if($subType) {
            $template = Template::select('id','type','typeId','subType','typeName','typeDescription','htmlContent','customStyle','vendorStyle','fonts','vendorScripts','scripts','created_at')
                                ->where('type', $type)
                                ->where('subType', $subType)
                                ->orderBy('typeId', 'asc')->simplePaginate(1);
        } else {
            $template = Template::select('id','type','typeId','subType','typeName','typeDescription','htmlContent','customStyle','vendorStyle','fonts','vendorScripts','scripts','created_at')
                                ->where('type', $type)
                                ->where('subType', '1')
                                ->orderBy('typeId', 'asc')->simplePaginate(1);
        }

        foreach ($template as $t)
        {
            $typeId = $t->typeId;
            $subType = $t->subType;
        }

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
                                ->where('type', $type)
                                ->where('typeId', $typeId)
                                ->where('subType', $subType)
                                ->count();

            $addedCount = DB::table('orderfavorites')
                                ->where('customerId', $id)
                                ->count();
        } else {
            $addedFavorite = 0;
            $addedCount = 0;
            $selections = [];
        }

        //  Template navbar Data
        return view('templates.listing-demo-'.$view)->with([
            'view' => $view,
            'template' => $template,
            'type' => $type,
            'typeId' => $typeId,
            'subType' => $subType,
            'addedFavorite' => $addedFavorite,
            'selections' => $selections,
            'addedCount' => $addedCount
        ]);
    }

    public function lists($view, $type, $typeId, $subType = null) 
    {
        /*
        *   To Render all Subtypes of a particular Type Type and TypeId, No use with type-Component
        *   Called from - Layout-singleList-XXX
        */

        $template = Template::select('id','type','typeId','subType','typeName','typeDescription','htmlContent','customStyle','vendorStyle','fonts','vendorScripts','scripts','created_at')
                            ->where('type', $type)
                            ->where('typeId', '<=', $typeId)
                            ->orderBy('typeId', 'desc')
                            ->simplePaginate(1);

        foreach ($template as $temp) {
            $subType = $temp->subType;
        }

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
                                ->where('type', $type)
                                ->where('typeId', $typeId)
                                ->where('subType', $subType)
                                ->count();

            $addedCount = DB::table('orderfavorites')
                                ->where('customerId', $id)
                                ->count();
        } else {
            $addedFavorite = 0;
            $addedCount = 0;
            $selections = [];
        }

        //  Template navbar Data
        return view('templates.listingSingle-demo-'.$view)->with([
            'view' => $view,
            'template' => $template,
            'type' => $type,
            'typeId' => $typeId,
            'subType' => $subType,
            'addedFavorite' => $addedFavorite,
            'selections' => $selections,
            'addedCount' => $addedCount
        ]);
    }

    public function getTemplatePage($view, $type, $typeId, $subType) 
    {
        /*
        *   To Render single pointed component of any type
        *   Called from - no where for now
        */

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
            $selections = Orderfavorite::select('id','customerId','type','typeId','subType','typeName')
                            ->where('customerId', $id)
                            ->get();

            //  If following count is > 1 then component is already added to favorites
            $addedFavorite = DB::table('orderfavorites')
                                ->where('customerId', $id)
                                ->where('type', '=', $type)
                                ->where('typeId', '=', $typeId)
                                ->where('subType', '=', $subType)
                                ->count();

            $addedCount = DB::table('orderfavorites')
                                ->where('customerId', $id)
                                ->count();
        } else {
            $selections = [];
            $addedFavorite = 0;
            $addedCount = 0;
        }

        return view('templates.demo-'.$view)->with([
            'view' => $view,
            'template' => $template,
            'type' => $type,
            'typeId' => $typeId,
            'subType' => $subType,
            'addedFavorite' => $addedFavorite,
            'selections' => $selections,
            'addedCount' => $addedCount
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
}
