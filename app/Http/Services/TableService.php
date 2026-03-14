<?php
namespace App\Http\Services;

use App\Http\Repositories\TableRepository;

class TableService{

    public function __construct(
        private TableRepository $tableRepository,
    )
    {
        
    }

    public function create(int $restaurant_id, int $number, bool $active)
    {
        return $this->tableRepository->create($restaurant_id, $number, $active);
    }
    public function list(int $restaurant_id)
    {
        return $this->tableRepository->list($restaurant_id);
    }
    public function find(int $tableId)
    {
        return $this->tableRepository->find($tableId);
    }
    public function getTablesActives(int $restaurant_id)
    {
        return $this->tableRepository->getTablesActives($restaurant_id);
    }
    public function verifyDate(string $date)
    {
        return $this->verifyDate($date);
    }
    public function capacitedTables(int $restaurant_id, string $capacity, string $date)
    {
        return $this->tableRepository->capacitedTables($restaurant_id,$capacity,$date);
    }
}