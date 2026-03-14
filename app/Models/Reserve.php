<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'table_id',
        'date',
        'restaurant_id',
        'name_client',
        'phone_client',
        'finished',
        'peoples'
    ];
    protected $casts = [
        'date' => 'datetime',
    ];
    
    public function table(){
        return $this->belongsTo(Table::class,'table_id');
    }
}
