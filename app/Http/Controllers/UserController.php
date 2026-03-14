<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('layout.admin');
    }
    public function store(RequestUser $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'perfil_type' => 'Restaurante',
            'slug' => $request->slug
        ]);

        if($user){
            return redirect()->back()->with('success', 'Cadastro realizado');
        }
        return redirect()->back()->withErrors(['error', 'Falha ao criar novo restaurante']);
    }
    public function create()
    {
        return view('paneladmin.register');
    }
}

