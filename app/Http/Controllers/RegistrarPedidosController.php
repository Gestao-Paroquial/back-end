<?php

namespace App\Http\Controllers;
use PagSeguro;
use App\Pedido;

use Illuminate\Http\Request;

class RegistrarPedidosController extends Controller
{
    public function casamento(Request $request)
    {    
        $pedido = new Pedido();
        $pedido->casamento = true;
        $pedido->batismo = false;
        $pedido->nome = $request->nome;
        $pedido->email =  $request->email;
        $pedido->data =  $request->data;
        $pedido->cpf =  $request->cpf;

        
        return response()->json(['success' => true, $pedido]);
    }
}
