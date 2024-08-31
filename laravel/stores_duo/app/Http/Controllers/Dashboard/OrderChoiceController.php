<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orderchoice;
use App\Orderdata;

class OrderChoiceController extends Controller
{
    public function getOrderChoice($id)
    {
        $orderchoice = Orderchoice::select('id','customerId','orderId','type','typeId','subType','typeName','created_at')
                            ->where('orderId', $id)
                            ->get();

        $response = [
            'data' => $orderchoice
        ];
        return response()->json($response, 200);
    }

    public function getOrderUserDataStatus($id)
    {
        $userdata = Orderdata::select('id','customerId','orderId','domainName','tagLine','contactEmail','contactAddr1','contactAddr2','contentFile','seoContent','pageContent','images','brandImage','favicon','video','videoLink','font','created_at')
                            ->where('orderId', $id)
                            ->get();

        $response = [
            'data' => $userdata
        ];
        return response()->json($response, 200);
    }

    public function postOrderUserDataStatus(Request $request, $id)
    {
        $userdata = Orderdata::find($id);

        if(!$userdata) {
            return response()->json(['message' => 'User Data not found'], 404);
        }

        $userdata->domainName = $request->input('domainName');
        $userdata->tagLine = $request->input('tagLine');
        $userdata->contactEmail = $request->input('contactEmail');
        $userdata->contactAddr1 = $request->input('contactAddr1');
        $userdata->contactAddr2 = $request->input('contactAddr2');
        $userdata->contentFile = $request->input('contentFile');
        $userdata->seoContent = $request->input('seoContent');
        $userdata->pageContent = $request->input('pageContent');
        $userdata->images = $request->input('images');
        $userdata->brandImage = $request->input('brandImage');
        $userdata->favicon = $request->input('favicon');
        $userdata->video = $request->input('video');
        $userdata->videoLink = $request->input('videoLink');
        $userdata->font = $request->input('font');

        $userdata->update();

        return response()->json(['userdata' => $userdata], 200);
    }
}
