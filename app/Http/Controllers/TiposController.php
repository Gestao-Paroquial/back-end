<?php

namespace App\Http\Controllers;

use App\TipoEvento;
use App\TipoDependente;
use App\TipoDoacoe;
use App\TipoLancamento;
use App\TipoMembro;
use App\TipoPagamento;
use Illuminate\Http\Request;

class TiposController extends Controller
{
  
    public function index()
    {
        $tipos = [
            'eventos' =>TipoEvento::all(),
            'dependentes' =>TipoDependente::all(),
            'doacoes' =>TipoDoacoe::all(),
            'lancamentos' =>TipoLancamento::all(),
            'pagamentos' =>TipoPagamento::all(),
            'membros' =>TipoMembro::all(),
        ];
        
        return response()->json($tipos);
    }

}
