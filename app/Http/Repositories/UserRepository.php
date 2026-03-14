<?php
namespace App\Http\Repositories;

use App\Models\User;
use App\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{
    public function __construct(

    )
    {

    }

    public function checkPerfilTypeAdmin(int $userId)
    {
        $user = User::where('id', $userId)->where('perfil_type', '=', 'Administrador')->first();

        if(empty($user)){
            return false;
        }
        return true;
        
    }
    public function checkPerfilTypeRestaurant(int $userId)
    {
        $user = User::where('id', $userId)->where('perfil_type', '=', 'Restaurante')->first();

        if(empty($user)){
            return false;
        }
        return true;
        
    }
}