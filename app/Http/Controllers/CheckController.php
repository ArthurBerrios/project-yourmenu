<?php

namespace App\Http\Controllers;

use App\Http\Services\CheckService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public function __construct(
        private CheckService $checkService,
    )
    {
    
    }
    public function index()
    {
        $checks = $this->checkService->getChecksNoPaids(Auth::user()->id);

        return view('panelclient.checks',compact('checks'));
    }
    public function edit(int $id)
    {
        $check = $this->checkService->findById($id);

        return view('panelclient.edit-check',compact('check'));
    }
    public function update(Request $request)
    {
        $check = $this->checkService->findById($request->id);

        $check->update([
            'paid' => $request->paid
        ]);

        return redirect()->route('checks-panel');
    }
}
