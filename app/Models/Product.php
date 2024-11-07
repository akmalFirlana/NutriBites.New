<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'stock',
        'price',
        'description',
        'nutrition_info',
        'shelf_life',
        'weight',
        'shipping_address_id',
        'category',
        'image_1',
        'image_2',
        'image_3',
        'image_4'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}


