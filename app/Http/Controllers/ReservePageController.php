<?php

namespace App\Http\Controllers;

use App\Http\Services\TableService;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ReservePageController extends Controller
{
    public function __construct(
        private TableService $tableService,
    )
    {

    }
    public function index()
    {
        $tables = [];
        return view('reserve',compact('tables'));
    }
    public function searchTable(Request $request, $slug)
    {
        $restaurant_id = session('restaurant_id');
        $tables = $this->tableService->capacitedTables($restaurant_id, $request->capacity, $request->date);

        return view('reserve',compact('tables'));
    }
    public function store(Request $request)
    {
        $restaurant_id = session('restaurant_id');

        $reserve = Reserve::create([
            'table_id' => $request->table_id,
            'date' => $request->date,
            'restaurant_id' => $restaurant_id,
            'name_client' => $request->name_client,
            'phone_client' => $request->phone_client,
            'peoples' => $request->capacity,
        ]);

        $tables = [];

        return view('reserve',compact('tables','reserve'));
    }
}
