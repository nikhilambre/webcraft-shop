<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{

    public function scopeGetForPagename($query, $pageName)
    {
        $query->select('id','pageName','seoStatus','title','description','keyword','ogImgName','twitterCardType',
                    'twitterSite','twitterCreator','twitterAppCountry','twitterAppNameIphone','twitterAppIdIphone',
                    'twitterAppUrlIphone','twitterAppNameIpad','twitterAppIdIpad','twitterAppUrlIpad',
                    'twitterAppNameGoogleplay','twitterAppIdGoogleplay','twitterAppUrlGoogleplay','created_at')
                ->where('pageName', $pageName);
    }

}
