<?php
namespace App\Http\Repositories;

use App\Models\Product;
use App\ProductInterfaceRepository;
use Illuminate\Http\Client\Request;

class ProductRepository implements ProductInterfaceRepository{

        public function list(int $restaurant_id)
        {
            return Product::where('restaurant_id', '=', $restaurant_id)->get();
        }
        public function nameImage(string $file_name)
        {
            return rand(0,99999) . $file_name;
        }
        public function create(array $data)
        {            
            Product::create($data);
        }
        public function findById(int $id)
        {            
            return Product::find($id);
        }
        public function getProductsAvailables(int $restaurant_id)
        {
            return Product::where('restaurant_id', '=', $restaurant_id)->where('available','=',true)->get();
        }
}