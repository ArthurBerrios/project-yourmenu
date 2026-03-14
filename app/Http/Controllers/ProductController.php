<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService,
    )
    {
        
    }
    public function index()
    {
        $products = $this->productService->list(Auth::user()->id);

        return view('panelclient.products',compact('products'));
    }
    public function create()
    {
        return view('panelclient.create-product');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $nameImage = $this->productService->nameImage($request->file('image')->getClientOriginalName());
        $path = $request->file('image')->storeAs('uploads', $nameImage);
        $data['image'] = $path;
        $data += ['restaurant_id' => Auth::user()->id];

        $this->productService->create($data);

        return redirect()->route('products-panel')->with('success', 'Produto criado com sucesso!');
    }
    public function edit(int $id)
    {
        $product = $this->productService->findById($id);

        return view('panelclient.edit-product', compact('product'));
    }
    public function update(Request $request, int $id)
    {
        $product = $this->productService->findById($id);
        $data = $request->all();

        if($request->image){
            $nameImage = $this->productService->nameImage($request->file('image')->getClientOriginalName());
            $path = $request->file('image')->storeAs('uploads', $nameImage);
            $data['image'] = $path;

        }
        else{
            $data['image'] = $product->image;
        }
            
        $product->update($data);

        return redirect()->route('products-panel')->with(['success' => 'Produto editado com sucesso!']);
    }
    public function destroy($id)
    {
        $product = $this->productService->findById($id);

        $product->delete();

        return redirect()->route('products-panel')->with(['success' => 'Produto excluído com sucesso']);
    }
}
