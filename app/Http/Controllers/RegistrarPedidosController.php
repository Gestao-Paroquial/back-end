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
        $pedido->aprovado = 0;
        $pedido->nome = $request->nome;
        $pedido->mensagem = $request->mensagem;
        $pedido->email =  $request->email;
        $pedido->data =  $request->data;
        $pedido->cpf =  $request->cpf;

        $pedido->save();
        return response()->json(['success' => true]);
    }
}
