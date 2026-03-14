<?php
namespace  App\Http\Services;

use App\Http\Repositories\OrderRepository;

class OrderService {
    public function __construct(
        private OrderRepository $orderRepository,
    )
    {
       
    }

    public function getOrdersFromTable(int $table_id)
    {
        return $this->orderRepository->getOrdersFromTable($table_id);
    }
    public function getAllOrders(int $restaurant_id)
    {
        return $this->orderRepository->getAllOrders($restaurant_id);
    }
    public function findById(int $id)
    {
        return $this->orderRepository->findById($id);
    }
}