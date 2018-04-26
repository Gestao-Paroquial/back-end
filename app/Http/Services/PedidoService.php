<?php

namespace App\Http\Services;

class PedidoService
{
    public static function notification($information)
    {
        print($information->getStatus()->getCode());
    }
}
