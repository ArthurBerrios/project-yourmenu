<?php

namespace App\Models;

use App\Http\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'table_id',
        'price',
        'name_client',
        'status',
        'check_id',
        'restaurant_id',
    ];
    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function check()
    {
        return $this->belongsTo(Check::class,'check_id');
    }
    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
    public function items()
    {
        return $this->hasMany(ItemsOrder::class,'order_id');
    }
}
