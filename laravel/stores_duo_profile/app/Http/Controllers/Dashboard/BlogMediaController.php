<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Blogmedia;

class BlogMediaController extends Controller
{
    public function postBlogMedia(Request $request)
    {
        //  For Image files upload
        $mediaImage = $request->file('mediaImage');
        $count = 0;

        if ($request->hasFile('mediaImage')) {
            foreach ($mediaImage as $photo) {
                $type = $photo->getClientOriginalExtension();

                if ($type == 'jpeg' ||  $type == 'gif' || $type == 'bmp' || $type == 'png' || $type == 'jpg'){

                    if ($photo->getClientSize() < 900100) {
                        
                        $count = $count + 1;
                        if ( $count > 10 ) {break;}     // Max 10 images can be uploaded at once
                        
                        $blogmedia = new Blogmedia();
    
                        $temp = $photo->getClientOriginalExtension();
                        $newfilename = 'image_' .uniqid(). '.' . $temp;
    
                        $blogmedia->mediaSize = $photo->getClientSize();
                        $blogmedia->mediaPath = Storage::putFileAs('public/media', $photo, $newfilename);
                        $blogmedia->mediaName = $newfilename;
                        $blogmedia->mediaType = $photo->getClientMimeType();
    
                        $blogmedia->save();
                    }
                }
            }
        }

        //  For Video File
        if ($request->hasFile('mediaVideo')) {
            if ($type == 'mp4' ||  $type == 'mov' || $type == 'wmv' || $type == 'avi' || $type == 'webm' || 
                $type == 'x-m4v' || $type == 'x-ms-wmv' || $type == 'x-msvideo' || $type == '3gpp' || $type == 'mpeg' || 
                $type == 'ogv' || $type == 'x-matroska'){
                
                if ($request->file('mediaVideo')->getClientSize() < 40000000) {   // 40MB Max
                                        
                    $blogmedia = new Blogmedia();

                    $temp = $request->file('mediaVideo')->getClientOriginalExtension();
                    $newfilename = 'video_' .uniqid(). '.' . $temp;

                    $blogmedia->mediaSize = $request->file('mediaVideo')->getClientSize();
                    $blogmedia->mediaPath = Storage::putFileAs('public/media', $request->file('mediaVideo'), $newfilename);
                    $blogmedia->mediaName = $newfilename;
                    $blogmedia->mediaType = $request->file('mediaVideo')->getClientMimeType();

                    $blogmedia->save();
                }
            }
        }

        return response()->json(['blogmedia' => $blogmedia], 201);
    }

    public function getBlogMedias()
    {
        $blogmedia = Blogmedia::select('id','mediaName','mediaPath','mediaType','mediaSize','created_at')
                            ->get();

        $response = [
            'data' => $blogmedia
        ];
        return response()->json($response, 200);
    }

    public function getBlogMedia($id)
    {
        $blogMedias = BlogMedia::select('id','mediaName','mediaPath','mediaType','mediaSize','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $blogMedias
        ];
        return response()->json($response, 200);
    }

    public function deleteBlogMedia($id)
    {
        $blogMedia = BlogMedia::where('id', $id)->get()->first();

        Storage::delete($blogMedia->mediaPath);

        $blogMedia = BlogMedia::find($id);
        $blogMedia->delete();
        return response()->json(['message' => 'Media deleted Successfully.', 200]);
    }
}
