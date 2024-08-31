<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Editsection;
use Illuminate\Support\Facades\Storage;

class sectionEditController extends Controller
{
    public function ajaxPostSection(Request $request)
    {
        $this->validate($request, [
            'sectionId' => 'required',
            'pageName' => 'required',
        ]);

        $editsection = Editsection::firstOrNew(['sectionId' => $request->input('sectionId')]);

        $editsection->sectionId = $request->input('sectionId');
        $editsection->sectionContent = $request->input('sectionContent');
        $editsection->pageName = $request->input('pageName');
        $editsection->contentType = 'TEXT';
        $editsection->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Section Updated Successfully.'
        ], 201);
    }

    public function postSectionImage(Request $request)
    {
        $this->validate($request, [
            'sectionId' => 'required',
            'pageName' => 'required',
        ]);

        $sectionImg = $request->file('sectionImage');
        
        if ($request->hasFile('sectionImage')) {
            if ($sectionImg->getClientSize() < 600000) {

                $editsection = Editsection::firstOrNew(['sectionId' => $request->input('sectionId')]);
    
                $temp = $sectionImg->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;
    
                Storage::putFileAs('public/page', $sectionImg, $newfilename);
    
                $editsection->sectionContent = $newfilename;
                $editsection->sectionId = $request->input('sectionId');
                $editsection->pageName = $request->input('pageName');
                $editsection->contentType = 'IMAGE';
                $editsection->save();
            } else {
                return back()->with('error_message','Please Upload Image of Less than 600Kb.');
            }
        } else {
            return back()->with('error_message','Image Field is Required.');
        }
        return redirect()->back();
    }

    public function ajaxUpdateImage(Request $request)
    {
        $this->validate($request, [
            'sectionId' => 'required',
            'pageName' => 'required',
        ]);

        $editsection = Editsection::firstOrNew(['sectionId' => $request->input('sectionId')]);

        $editsection->sectionContent = $request->input('sectionContent');
        $editsection->sectionId = $request->input('sectionId');
        $editsection->pageName = $request->input('pageName');
        $editsection->contentType = 'IMAGE';
        $editsection->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Your Image Updated Successfully.'
        ], 201);
    }

}
