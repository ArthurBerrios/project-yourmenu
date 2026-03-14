<?php

namespace App;

interface TableInterfaceRepository
{
    public function create(int $restaurant_id, int $number, bool $active);
    public function list(int $restaurant_id);
    public function find(int $tableId);
    public function getTablesActives(int $restaurant_id);
    public function verifyDate(string $date);
    public function capacitedTables(int $restaurant_id, string $capacity, string $date);    
}
