<?php

namespace App\Http\Controllers;

use App\TipoDependente;
use Illuminate\Http\Request;

class TipoDependenteController extends Controller
{

    public function index()
    {
        return response()->json(TipoDependente::all());
    }

    public function store(Request $request)
    {
        $tipoDependente = TipoDependente::create($request->all());
        return response()->json(['message' => 'Adicionado com sucesso', "tipo" => $tipoDependente]);
    }

    public function show($id)
    {
        $tipoDependente = TipoDependente::findOrFail($id);
        return response()->json($tipoDependente);
    }

    public function update(Request $request, $id)
    {
        $tipoDependente = TipoDependente::findOrFail($id);
        $tipoDependente->fill($request->all());
        $tipoDependente->save();
        return response()->json(['message' => 'Alterado com sucesso']);
    }

    public function destroy($id)
    {
        $tipoDependente = TipoDependente::findOrFail($id);
        $tipoDependente->delete();
        return response()->json(['message' => 'Removido com sucesso']);
    }
}
