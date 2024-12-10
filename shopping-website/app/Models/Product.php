<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'rating',
        'rating_count',
        'is_on_sale',
        'is_best_seller',
        'is_new_release',
        'is_todays_deal',
        'category_id',
        'photo'
    ];
}
