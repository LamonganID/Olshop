<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=[
        'user_id',
        'status',
        'total',
        'delivered_date',
        'address',
        'phone',
        'payment_method',
        'payment_status',
        'is_shipping_different',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_phone',
        'shipping_email',
        'shipping_city',
        'shipping_country',
        'shipping_postcode',
    ];
}
