<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use PagSeguro;

class PedidosController extends Controller
{
    public function index()
    {
        return response()->json(Pedido::all());
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->fill($request->all());
        $pedido->save();
        $this->checkoutCasamento($pedido);
        return response()->json($pedido);
    }

    public function registrarPedidoCasamento(Request $request)
    {
        $pedido = new Pedido();
        $pedido->casamento = true;
        $pedido->batismo = false;
        $pedido->aprovado = 0;
        $pedido->nome = $request->nome;
        $pedido->mensagem = $request->mensagem;
        $pedido->email = $request->email;
        $pedido->data = $request->data;
        $pedido->cpf = $request->cpf;

        $pedido->save();
        return response()->json(['success' => true]);
    }

    public function checkoutCasamento($pedido)
    {
        $data = [
            'items' => [
                [
                    'id' => $pedido->id,
                    'description' => 'Casamento',
                    'quantity' => 1,
                    'amount' => 100.5,
                ],
            ],
            'sender' => [
                'name' => $pedido->nome,
                'documents' => [
                    [
                        'number' => $pedido->cpf,
                        'type' => 'CPF',
                    ],
                ],
            ],
            'currency' => 'BRL',
        ];

        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
        if ($information) {
            $pedido->code = $information->getCode();
            $pedido->data_do_checkout = $information->getDate();
            $pedido->link = $information->getLink();
            $pedido->save();
        }
    }

}
