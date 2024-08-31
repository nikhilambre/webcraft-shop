<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Categor extends Model
{
    
    public function scopeGetForId($query, $id)
    {
        $query->select('categors.id','categoryName','categoryDescription','filterName','filters.id as filterId','categoryStatus','categors.created_at')
                ->leftJoin('filters', 'categors.filterId', '=', 'filters.id')
                ->where('categors.id', $id);
    }

    public function scopeGetAll($query)
    {
        $query->select('categors.id','categoryName','filterName','categoryStatus','categors.created_at')
                ->leftJoin('filters', 'categors.filterId', '=', 'filters.id');
    }

    public function scopeGetForToken($query)
    {
        $query->select('categors.id','categoryName', 'filterName', 'filters.id as filterId')
                ->leftJoin('filters', 'categors.filterId', '=', 'filters.id')
                ->where('categors.filterId', '=', $id);
    }

    public function saveData($request)
    {
        if ($request->hasFile('categoryImage')) {
            
            if ($request->file('categoryImage')->getClientSize() < 900100) {

                $temp = $request->file('categoryImage')->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $this->categoryImgSize = $request->file('categoryImage')->getClientSize();
                $this->categoryImgPath = Storage::putFileAs('public/category', $request->file('categoryImage'), $newfilename);
                $this->categoryImgName = $newfilename;
                $this->categoryImgType = $request->file('categoryImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $this->categoryName = $request->input('categoryName');
        $this->categoryNameSlug = str_slug($request->input('categoryName'), '-');
        $this->categoryDescription = $request->input('categoryDescription');
        $this->categoryStatus = $request->input('categoryStatus');
        $this->filterId = $request->input('filterId');
        $this->categoryTag = $request->input('categoryTag');

        $this->save();
        return $this;
    }

    public function updateData($request)
    {
        if ($request->hasFile('categoryImage')) {
            
            if ($request->file('categoryImage')->getClientSize() < 900100) {

                $temp = $request->file('categoryImage')->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $this->categoryImgSize = $request->file('categoryImage')->getClientSize();
                $this->categoryImgPath = Storage::putFileAs('public/category', $request->file('categoryImage'), $newfilename);
                $this->categoryImgName = $newfilename;
                $this->categoryImgType = $request->file('categoryImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $this->categoryName = $request->input('categoryName');
        $this->categoryNameSlug = str_slug($request->input('categoryName'), '-');
        $this->categoryDescription = $request->input('categoryDescription');
        $this->categoryStatus = $request->input('categoryStatus');
        $this->filterId = $request->input('filterId');
        $this->categoryTag = $request->input('categoryTag');

        $this->update();
        return $this;
    }

    
}
