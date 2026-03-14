<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Http\Services\TableService;
use App\Models\Check;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private TableService $tableService,
    )
    {

    }
    public function index(string $slug){

        return view('home');
    }
    public function products_show()
    {
        $products = $this->productService->getProductsAvailables(session('restaurant_id'));
        
        return view('products', compact('products'));
    }
    public function add_cart(string $slug, int $id)
    {
        $product = $this->productService->findById($id);

        $cart = session()->get('cart', []);

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produto adicionado!');
    }
}
