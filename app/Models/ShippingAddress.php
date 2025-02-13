<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingAddress extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'order_id', 
        'address', 
        'city', 
        'postal_code', 
        'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
