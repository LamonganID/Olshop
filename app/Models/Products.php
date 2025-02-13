<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'categories_id', 
        'name', 
        'slug', 
        'description', 
        'price', 
        'stock', 
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
