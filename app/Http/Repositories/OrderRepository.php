<?php
namespace App\Http\Repositories;

use App\Models\ItemsOrder;
use App\Models\Order;
use App\OrderInterfaceRepository;
use Illuminate\Database\Eloquent\Builder;

class OrderRepository implements OrderInterfaceRepository{

    public function getOrdersFromTable(int $table_id)
    {
       return Order::where('table_id', '=', $table_id)->latest()->first();
    }
    public function getAllOrders(int $restaurant_id)
    {
        return Order::where('restaurant_id','=',$restaurant_id)
            ->with('items.product')
            ->whereHas('check', function (Builder $query){
                $query->where('paid', false);
            })
            ->orderByDesc('created_at')
            ->get();
    }
    public function findById(int $id)
    {
        return Order::where('id', '=', $id)->first();
    }
}