<?php

namespace App;

use App\Models\Order;

interface OrderInterfaceRepository
{
    public function getOrdersFromTable(int $table_id);
    public function getAllOrders(int $restaurant_id);
    public function findById(int $id);

}