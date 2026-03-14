<?php
namespace App\Http\Repositories;

use App\CheckInterfaceRepository;
use App\Http\Services\OrderService;
use App\Models\Check;

class CheckRepository implements CheckInterfaceRepository{

    public function __construct(
        private OrderService $orderService,
    )
    {
        
    }

    public function getCheckPaidFromTable(int $table_id)
    {
        $order = $this->orderService->getOrdersFromTable($table_id);

        if($order)
        {
            $checkOpen = $order->check->where('paid', '=', false);

            if($checkOpen)
            {
                return $order->check;
            }
            return null;
        }
        else{
            return null;
        }   
    }
    public function findById(int $id)
    {
        return Check::find($id);
    }
    public function getChecksNoPaids(int $restaurant_id)
    { 
        return Check::where('paid', false)
            ->whereHas('orders', function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            })
            ->with('orders')
            ->orderByDesc('requested')
            ->get();
    }
}