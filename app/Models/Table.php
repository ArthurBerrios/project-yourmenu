<?php

namespace App\Models;

use App\Http\Services\TableService;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'restaurant_id',
        'number',
        'active',
        'capacity'
    ];

    public function reserve(){
        return $this->hasMany(Reserve::class,'table_id');
    }
}
