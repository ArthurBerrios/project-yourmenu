<?php

namespace App\Http\Middleware;

use App\Http\Services\UserService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPerfilTypeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userService = app(UserService::class);

        if(Auth::check()){
            $user = $userService->checkPerfilTypeAdmin(Auth::user()->id);

            if(!empty($user)){
                return $next($request);
            }
        }

        return redirect()->route('login')->with(['error' => 'Acesso negado']);
    }
}
