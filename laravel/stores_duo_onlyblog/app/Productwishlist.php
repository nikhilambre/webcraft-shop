<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productwishlist extends Model
{
    protected $fillable = [
        'productId', 'customerId'
    ];
}
