<?php

namespace App\Http\Controllers;

use App\TipoDependente;
use App\TipoDoacoe;
use App\TipoEvento;
use App\TipoLancamento;
use App\TipoMembro;
use App\TipoPagamento;

class TiposController extends Controller
{

    public function index()
    {
        $tipos = [
            'eventos' => TipoEvento::all(),
            'dependentes' => TipoDependente::all(),
            'doacoes' => TipoDoacoe::all(),
            'lancamentos' => TipoLancamento::all(),
            'pagamentos' => TipoPagamento::all(),
            'membros' => TipoMembro::all(),
        ];

        return response()->json($tipos);
    }

}
