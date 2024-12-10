<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'cart_id',
        'base_total',
        'total_items',
        'tax',
        'shipping',
        'total_cost',
        'address',
        'order_number',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

}
