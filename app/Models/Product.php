<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
        'bpom_license',
        'sold',
        'rating',
        'category',
        'images',
        'composition'
    ];

    protected $casts = [
        'images' => 'array', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(UserAddress::class, 'shipping_address_id');
    }
}
