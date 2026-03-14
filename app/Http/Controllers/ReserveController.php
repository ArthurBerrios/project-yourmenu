<?php

namespace App\Http\Controllers;

use App\Http\Services\ReserveService;
use App\Models\Reserve;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function __construct(
        private ReserveService $reserveService,
    )
    {
        
    }
    public function index()
    {
        $date = Carbon::today()->toDateString();
        $reserves = $this->reserveService->reserveOfDate(Auth::user()->id, $date);

        return view('panelclient.reserves',compact('reserves'));
    }

    public function search(Request $request)
    {
        $reserves = $this->reserveService->reserveOfDate(Auth::user()->id, $request->date);

        return view('panelclient.reserves',compact('reserves'));
    }
    public function edit(int $id)
    {
        $reserve = $this->reserveService->findById($id);

        return view('panelclient.edit-reserve', [$reserve->id],compact('reserve'));
    }
    public function update(Request $request, Reserve $reserve)
    {
        $reserve->update(
            [
                'finished' => $request->finished
            ]
        );
        
        return redirect()->route('reserves-panel')->with(['success' => 'Editado com sucesso!']);
    }

}
