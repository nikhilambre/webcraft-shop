<?php

namespace App\Http\Controllers\Templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Template;
use App\Orderfavorite;
use Auth;
use DB;

class TemplateController extends Controller
{
    public function index()
    {
        return view('guest.template');
    }

    public function getComponentType()
    {
        return view('guest.template-component-type');
    }

    public function getComponentList($subType)
    {
        $template = Template::select('id','type','typeId','subType','typeName','templateImage')
                            ->where('type', 'component')
                            ->where('subType', $subType)
                            ->orderBy('typeId', 'desc')
                            ->paginate(20);

        return view('guest.template-component-list')->with([
            'template' => $template,
        ]);
    }

    public function ajaxSaveFavorite(Request $request) 
    {
        $customerId = Auth::guard('customer')->id();
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

    public function ajaxDeleteFavorite(Request $request)
    {
        $customerId = Auth::guard('customer')->id();
        $id = $request->input('id');

        $orderfavorite = Orderfavorite::find($id);
        $orderfavorite->delete();

        return "It's Removed from your Favorites.!";
    }

    public function lists($type)
    {
        $template = Template::select('id','type','typeId','subType','typeName','templateImage')
                            ->where('type', $type)
                            ->where('subType', '1')
                            ->orderBy('typeId', 'desc')
                            ->paginate(20);

        return view('guest.template-'.$type.'-list')->with([
            'template' => $template,
        ]);
    }
}
