<?php
namespace App\Http\Repositories;

use App\Models\Reserve;
use App\ReserveInterfaceRepository;

class ReserveRepository implements ReserveInterfaceRepository
{
    public function reserveOfDate(int $restaurant_id, string $date)
    {
        return Reserve::where('restaurant_id', '=', $restaurant_id)
            ->where('date','like',"%{$date}%")
            ->where('finished', '=', false)
            ->orderByDesc('date')
            ->get();
    }
    public function findById(int $id)
    {
        return Reserve::where('id', '=', $id)->first();
    }
}