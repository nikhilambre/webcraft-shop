<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editsection extends Model
{
    protected $fillable = [
        'sectionId', 'sectionContent'
    ];

    public function scopeGetSectionContent($query, $pageName)
    {
        $query->select('id','sectionId','sectionCode','pageName','contentType','sectionContent','created_at')
                ->where('pageName', $pageName);
    }

    public function scopeGetSectionImages($query, $pageName)
    {
        $query->select('id','sectionId','sectionCode','pageName','sectionContent','created_at')
                ->where('pageName', $pageName)
                ->where('contentType', 'IMAGE');
    }
}
