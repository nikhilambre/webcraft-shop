<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderfavorite extends Model
{
    protected $fillable = ['customerId','type','typeId','subType','typeName'];
}
