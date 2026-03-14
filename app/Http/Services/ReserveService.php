<?php
namespace App\Http\Services;

use App\Http\Repositories\ReserveRepository;

class ReserveService{
    public function __construct(
        private ReserveRepository $reserveRepository,
    )
    {
       
    }
    public function reserveOfDate(int $restaurant_id, string $date)
    {
        return $this->reserveRepository->reserveOfDate($restaurant_id, $date);
    }
    public function findById(int $id)
    {
        return $this->reserveRepository->findById($id);
    }
}