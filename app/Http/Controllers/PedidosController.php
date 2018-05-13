<?php

namespace App\Http\Controllers;

use App\Mail\PedidoAprovado;
use App\Mail\PedidoReprovado;
use App\Http\Services\PagSeguroService;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PagSeguro;
use Validator;
use PHPSC\PagSeguro\Purchases\Subscriptions\Locator as SubscriptionLocator;
use PHPSC\PagSeguro\Purchases\Transactions\Locator as TransactionLocator;

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
        
        
        if ($pedido->aprovado == 2) $this->enviarEmailDeReprovacao($pedido, $request->conteudoEmail);

        $itemName;
        $value;
        if ($pedido->aprovado == 1 && $pedido->casamento == 1) {
            $itemName = "Casamento";
            $value = 100;
        } else if ($pedido->aprovado == 1 && $pedido->batismo == 1) {
            $itemName = "Batismo";
            $value = 100;
        } 

        if ($pedido->aprovado == 1)  
        {
            $pagseguroService = new PagSeguroService();
            $pedido->link = $pagseguroService->checkout($pedido->id, $itemName, $value);
            $pedido->code = 1;
            $this->enviarEmailDeAprovacao($pedido);
        }        
        
        $pedido->save();
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
    public function enviarEmailDeAprovacao($pedido)
    {
        Mail::to($pedido->email)->send(new PedidoAprovado($pedido));
    }

    public function enviarEmailDeReprovacao($pedido, $conteudoEmail)
    {
        Mail::to($pedido->email)->send(new PedidoReprovado($conteudoEmail));
    }

}
