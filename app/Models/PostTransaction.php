<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\UserAddress;

class PostTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
        'shipping_method',
        'estimated_delivery',
        'order_status',
        'payment_type',
        'shipping_cost',
    ];
    protected $casts = [
        'transaction_time' => 'datetime',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class, 'user_id', 'user_id');
    }
}
