<?php

namespace App\Http\Controllers;

use App\Mail\PedidoAprovado;
use App\Mail\PedidoReprovado;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PagSeguro;
use Validator;

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
        if ($pedido->aprovado == 1 && $pedido->casamento == 1) {
            $this->checkoutCasamento($pedido);
        } else if ($pedido->aprovado == 1 && $pedido->batismo == 1) {
            $this->checkoutBatismo($pedido);
        } else if ($pedido->aprovado == 2) {
            $this->enviarEmailDeReprovacao($pedido, $request->conteudoEmail);
        }

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'cpf' => 'required|cpf',
            'data' => 'required|date',
            'nome' => 'required|min:5',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $pedido = new Pedido();
        $pedido->casamento = $request->casamento;
        $pedido->batismo = $request->batismo;
        $pedido->aprovado = 0;
        $pedido->nome = $request->nome;
        $pedido->mensagem = $request->mensagem;
        $pedido->email = $request->email;
        $pedido->data = $request->data;
        $pedido->cpf = $request->cpf;
        // $pedido->telefone = $request->telefone;

        $pedido->save();
        return response()->json(['success' => true]);
    }

    public function checkoutBatismo($pedido)
    {
        $data = [
            'items' => [
                [
                    'id' => $pedido->id,
                    'description' => 'Batismo',
                    'quantity' => 1,
                    'amount' => 50,
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

        $this->checkout($data, $pedido);
    }

    public function checkout($data, $pedido)
    {
        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
        if ($information) {
            $pedido->code = 1;
            $pedido->data_do_checkout = $information->getDate();
            $pedido->link = $information->getLink();
            $pedido->save();
            $this->enviarEmailDeAprovacao($pedido);
        }
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

        $this->checkout($data, $pedido);

    }

    public function enviarEmailDeAprovacao($pedido)
    {
        Mail::to($pedido->email)->send(new PedidoAprovado($pedido));
    }

    public function enviarEmailDeReprovacao($pedido, $conteudoEmail)
    {
        Mail::to($pedido->email)->send(new PedidoReprovado($conteudoEmail));
    }

}
