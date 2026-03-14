<?php

namespace App;

interface UserRepositoryInterface
{
    public function checkPerfilTypeAdmin(int $userId);
    public function checkPerfilTypeRestaurant(int $userId);
    
}
