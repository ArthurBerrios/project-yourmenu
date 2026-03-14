<?php

namespace App;

interface ReserveInterfaceRepository
{
    public function reserveOfDate(int $restaurant_id, string $date);
    public function findById(int $id);
}
