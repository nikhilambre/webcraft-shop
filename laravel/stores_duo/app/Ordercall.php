<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordercall extends Model
{
    protected $fillable = ['customerId','orderId','orderCode','callStatus'];
}
