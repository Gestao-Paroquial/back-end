<?php

namespace App\Http\Services;
use App\Pedido;

class PedidoService
{
    public static function notification($information)
    {
        $code = $information->getStatus()->getCode();
        $id = $information->getItems()[0]->getId();
        $pedido = Pedido::findOrFail($id);
        $pedido->code = $code;
        $pedido->save();

        return $pedido;
    }
}
