<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function edit()
    {
        return view('panelclient.edit-restaurant',[Auth::user()->id]);
    }
    public function update(Request $request)
    {
        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'primary_color' => $request->primary_color,
            'second_color' => $request->second_color
        ]);
        
        return redirect()->route('restaurant.edit',[Auth::user()->id])->with('success', 'Restaurante editado com sucesso!');
    }
}
