<?php
namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;

class ProductService{

    public function __construct(
        private ProductRepository $productRepository,
    )
    {
        
    }

    public function nameImage(string $file_name)
    {
        return $this->productRepository->nameImage($file_name);
    }
    public function list(int $restaurant_id)
    {
        return $this->productRepository->list($restaurant_id);
    }
    public function create(array $data)
    {
        return $this->productRepository->create($data);
    }
    public function findById(int $id)
    {
        return $this->productRepository->findById($id);
    }
    public function getProductsAvailables(int $restaurant_id)
    {
        return $this->productRepository->getProductsAvailables($restaurant_id);
    }
}