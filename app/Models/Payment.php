<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable =[
        'oreder_id',
        'payment_method',
        'payment_status',
    ];
}
