<?php

namespace App\Http\Controllers;

use App\Http\Services\TableService;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    public function __construct(
        private TableService $tableService,
    )
    {
        
    }

    public function index()
    {
        $tables = $this->tableService->list(Auth::user()->id);

        return view('panelclient.tables')
            ->with([
                'tables' => $tables,
            ]);
    }
    
    public function store()
    {
        return view('panelclient.create-table');
    }

    public function create(Request $request)
    {
        $this->tableService->create(Auth::user()->id, $request->number, $request->active);

        return redirect()->route('create-table')->with(['success' => 'Mesa criada']);
    }
    public function edit($id)
    {
        $table = $this->tableService->find($id);

        return view('panelclient.edit-table', compact('table'));
    }
    public function update(Request $request, $id)
    {
        $table = $this->tableService->find($id);
        
        $table->update(['number' => $request->number, 'active' => $request->active]);

        return redirect()->route('tables-panel');
    }
    public function destroy($id)
    {
        $table = $this->tableService->find($id);

        $table->delete();

        return redirect()->back();
    }
}
