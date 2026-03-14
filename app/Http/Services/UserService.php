<?php
namespace App\Http\Services;

use App\UserRepositoryInterface;

class UserService{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    )
    {
       
    }

    public function checkPerfilTypeAdmin(int $userId)
    {
        return $this->userRepository->checkPerfilTypeAdmin($userId);
    }
    public function checkPerfilTypeRestaurant(int $userId)
    {
        return $this->userRepository->checkPerfilTypeRestaurant($userId);
    }
}