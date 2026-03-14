<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'requested',
        'paid',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'check_id');
    }
}
