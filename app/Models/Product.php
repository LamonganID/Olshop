<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stck',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function ordersitem(){
        return $this->belongsToMany(OrderItem::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    
}
