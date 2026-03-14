<?php

namespace App;

use Illuminate\Http\Client\Request;

interface ProductInterfaceRepository
{
    public function nameImage(string $file_name);
    public function list(int $restaurant_id);
    public function create(array $data);
    public function findById(int $id);
    public function getProductsAvailables(int $restaurant_id);
}
