<?php 
namespace App\Http\Services;

use App\Http\Repositories\CheckRepository;

class CheckService{
    public function __construct(
        private CheckRepository $checkRepository,
    )
    {
        
    }

    public function getCheckPaidFromTable(int $table_id)
    {
        return $this->checkRepository->getCheckPaidFromTable($table_id);
    }
    public function findById(int $id)
    {
        return $this->checkRepository->findById($id);
    }
    public function getChecksNoPaids(int $restaurant_id)
    {
        return $this->checkRepository->getChecksNoPaids($restaurant_id);
    }
}