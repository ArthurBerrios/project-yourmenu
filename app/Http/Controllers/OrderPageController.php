<?php

namespace App\Http\Controllers;

use App\Http\Enums\StatusEnum;
use App\Http\Services\CheckService;
use App\Http\Services\TableService;
use App\Models\Check;
use App\Models\ItemsOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderPageController extends Controller
{
    public function __construct(
        private TableService $tableService,
        private CheckService $checkService,
    )
    {

    }
    public function create()
    {
        $tables = $this->tableService->getTablesActives(session('restaurant_id'));

        return view('order',compact('tables'));
    }

    public function store(Request $request)
    {
        $check = $this->checkService->getCheckPaidFromTable($request->table);
        $cart = session('cart');
        $total = 0;
        foreach($cart as $id => $details)
        {
            $total += $details['price'] * $details['quantity']; 
        }

        if(empty($check))
        {
            $check = Check::create([
                'requested' => false,
                'paid' => false,
            ]);

            $order = Order::create(
            [
                'table_id' => $request->table,
                'price' => $total,
                'name_client' => $request->name,
                'status' => StatusEnum::EM_PREPARO,
                'check_id' => $check->id, 
                'restaurant_id' => session('restaurant_id'),
            ]);
        }
        else{
            $order = Order::create(
            [
                'table_id' => $request->table,
                'price' => $total,
                'name_client' => $request->name,
                'status' => StatusEnum::EM_PREPARO,
                'check_id' => $check->id, 
                'restaurant_id' => session('restaurant_id'),
            ]);
        }

        Session::put('order_check', $check->id);

        session()->forget('cart');

        return redirect()->back()->with(['success' => 'Pedido realizado, logo menos estará em sua mesa!']);
    }
    public function requestCheck(string $slug, int $id)
    {
        $check = $this->checkService->findById($id);

        $check->update([
            'requested' => true,
        ]);

        
        return redirect()->route('create.order', session('slug'))->with(['order_requested' => 'Comanda solicitada!']);
    }
}
