<?php

namespace App\Http\Enums;

enum StatusEnum: int
{
    case EM_PREPARO = 1;
    case ENTREGUE = 2;

    public function type()
    {
        return match ($this){
            self::EM_PREPARO => 'Em preparo',
            self::ENTREGUE => 'Entregue',
        };
    }
}
