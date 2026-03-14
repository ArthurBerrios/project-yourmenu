<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'price',
        'description',
        'name',
        'image',
        'available',
        'restaurant_id',
    ];
}
