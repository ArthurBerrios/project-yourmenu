<?php

namespace App\Http\Controllers;

use App\Http\Services\CheckService;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private CheckService $checkService,
    )
    {

    }
    public function index()
    {
        $orders = $this->orderService->getAllOrders(Auth::user()->id);
    
        return view('panelclient.orders',compact('orders'));
    }
    public function edit(int $id)
    {
        $order = $this->orderService->findById($id);

        return view('panelclient.edit-order',compact('order'));
    }
    public function update(Request $request)
    {
        $order = $this->orderService->findById($request->id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('orders-panel')->with(['success' => 'Status do pedido alterado!']);
    }
    public function destroy(int $id)
    {
        $order = $this->orderService->findById($id);
        $order->items()->delete();
        $order->delete();

        return redirect()->route('orders-panel')->with(['success' => 'Pedido excluído!']);
    }
}
