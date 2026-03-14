<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IdentifyRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('slug');

        $restaurant = User::where('slug' , '=', $slug)->first();
        $restaurant_id = $restaurant->id;
        $name = $restaurant->name;
        Session::put('restaurant_id', $restaurant_id);
        Session::put('slug', $slug);
        Session::put('name', $name);
        Session::put('primary_color', $restaurant->primary_color);
        Session::put('second_color', $restaurant->second_color);
        
        return $next($request);
    }
}
