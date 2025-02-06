<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable =[
        'image_url',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute($value)
    {
        return asset('storage/'.$value);
    }

    public function setImageUrlAttribute($value)
    {
        $this->attributes['image_url'] = str_replace(asset('storage/'), '', $value);
    }
}
