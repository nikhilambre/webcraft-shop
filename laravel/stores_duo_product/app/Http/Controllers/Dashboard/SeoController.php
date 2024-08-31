<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seo;

class SeoController extends Controller
{
    public function postSeo(Request $request)
    {
        $this->validate($request, [
            'pageName' => 'required',
            'seoStatus' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
        ]);

        $seo = new Seo();

        if ($request->hasFile('seoImage')) {
            
            if ($request->file('seoImage')->getClientSize() < 500100) {

                $temp = $request->file('seoImage')->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $seo->seoImgSize = $request->file('seoImage')->getClientSize();
                $seo->seoImgPath = Storage::putFileAs('public/seo', $request->file('seoImage'), $newfilename);
                $seo->seoImgName = $newfilename;
                $seo->seoImgType = $request->file('seoImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $seo->pageName = $request->input('pageName');
        $seo->seoStatus = $request->input('seoStatus');
        $seo->title = $request->input('title');
        $seo->description = $request->input('description');
        $seo->keyword = $request->input('keyword');
        $seo->twitterCardType = $request->input('twitterCardType');
        $seo->twitterSite = $request->input('twitterSite');
        $seo->twitterCreator = $request->input('twitterCreator');
        $seo->twitterAppCountry = $request->input('twitterAppCountry');
        $seo->twitterAppNameIphone = $request->input('twitterAppNameIphone');
        $seo->twitterAppIdIphone = $request->input('twitterAppIdIphone');
        $seo->twitterAppUrlIphone = $request->input('twitterAppUrlIphone');
        $seo->twitterAppNameIpad = $request->input('twitterAppNameIpad');
        $seo->twitterAppIdIpad = $request->input('twitterAppIdIpad');
        $seo->twitterAppUrlIpad = $request->input('twitterAppUrlIpad');
        $seo->twitterAppNameGoogleplay = $request->input('twitterAppNameGoogleplay');
        $seo->twitterAppIdGoogleplay = $request->input('twitterAppIdGoogleplay');
        $seo->twitterAppUrlGoogleplay = $request->input('twitterAppUrlGoogleplay');

        $seo->save();
        return response()->json(['Seo' => $seo], 201);
    }

    public function getSeos()
    {
        $seos = Seo::select('id','pageName','seoStatus','title','created_at')
                            ->get();

        $response = [
            'data' => $seos
        ];
        return response()->json($response, 200);
    }

    public function getSeo($id)
    {
        $seos = Seo::select('id','pageName','seoStatus','title','description','keyword','ogImgName','twitterCardType',
                            'twitterSite','twitterCreator','twitterAppCountry','twitterAppNameIphone','twitterAppIdIphone',
                            'twitterAppUrlIphone','twitterAppNameIpad','twitterAppIdIpad','twitterAppUrlIpad',
                            'twitterAppNameGoogleplay','twitterAppIdGoogleplay','twitterAppUrlGoogleplay','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $seos
        ];
        return response()->json($response, 200);
    }

    public function putSeo(Request $request, $id)
    {
        $seo = Seo::find($id);

        if(!$seo) {
            return response()->json(['message' => 'Seo Content not found'], 404);
        }

        $this->validate($request, [
            'pageName' => 'required',
            'seoStatus' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
        ]);

        if ($request->hasFile('seoImage')) {
            
            if ($request->file('seoImage')->getClientSize() < 500100) {

                $temp = $request->file('seoImage')->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $seo->seoImgSize = $request->file('seoImage')->getClientSize();
                $seo->seoImgPath = Storage::putFileAs('public/seo', $request->file('seoImage'), $newfilename);
                $seo->seoImgName = $newfilename;
                $seo->seoImgType = $request->file('seoImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $seo->pageName = $request->input('pageName');
        $seo->seoStatus = $request->input('seoStatus');
        $seo->title = $request->input('title');
        $seo->description = $request->input('description');
        $seo->keyword = $request->input('keyword');
        $seo->twitterCardType = $request->input('twitterCardType');
        $seo->twitterSite = $request->input('twitterSite');
        $seo->twitterCreator = $request->input('twitterCreator');
        $seo->twitterAppCountry = $request->input('twitterAppCountry');
        $seo->twitterAppNameIphone = $request->input('twitterAppNameIphone');
        $seo->twitterAppIdIphone = $request->input('twitterAppIdIphone');
        $seo->twitterAppUrlIphone = $request->input('twitterAppUrlIphone');
        $seo->twitterAppNameIpad = $request->input('twitterAppNameIpad');
        $seo->twitterAppIdIpad = $request->input('twitterAppIdIpad');
        $seo->twitterAppUrlIpad = $request->input('twitterAppUrlIpad');
        $seo->twitterAppNameGoogleplay = $request->input('twitterAppNameGoogleplay');
        $seo->twitterAppIdGoogleplay = $request->input('twitterAppIdGoogleplay');
        $seo->twitterAppUrlGoogleplay = $request->input('twitterAppUrlGoogleplay');

        $seo->save();
        return response()->json(['seo' => $seo], 200);
    }

    public function deleteSeo($id)
    {
        $seo = Seo::find($id);
        $seo->delete();
        return response()->json(['message' => 'Seo deleted Successfully.', 200]);
    }
}
