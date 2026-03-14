<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUser;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(
        private UserService $userService
    )
    {
        
    }
    public function index(){
        return view('login');
    }
    public function store(RequestUser $request){
        $request->validated();

        $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password ]);

        if(!$authenticated){
            return redirect()->route('login')->withErrors(['error' => 'Email ou senha inválido']);
        }
        
        if(!empty($this->userService->checkPerfilTypeAdmin(Auth::user()->id)))
        {
            return redirect()->route('panel-admin')->with('success', 'Login concluído');  
        }
        else{
            return redirect()->route('panel-restaurant')->with('success', 'Login concluído'); 
        }     
    }
    public function destroy(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();

    }
}
