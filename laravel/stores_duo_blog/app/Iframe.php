<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iframe extends Model
{
    protected $fillable = [
        'iframeLink', 'created_at', 'updated_at'
    ];
}
