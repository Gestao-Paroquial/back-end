<?php

namespace App\Http\Controllers;

use App\Dependente;
use Illuminate\Http\Request;

class DependenteController extends Controller
{

    public function index()
    {
        return response()->json(Dependente::all());
    }

    public function store(Request $request)
    {
        $dependente = Dependente::create($request->all());
        return response()->json($dependente);
    }

    public function show($id)
    {
        $dependente = Dependente::findOrFail($id);
        return response()->json($dependente);
    }

    public function update(Request $request, $id)
    {
        $dependente = Dependente::findOrFail($id);
        $dependente->fill($request->all());
        $dependente->save();
        return response()->json($dependente);
    }

    public function destroy($id)
    {
        $dependente = Dependente::findOrFail($id);
        $dependente->delete();
        return response()->json(['message' => 'Dependente ' . $dependente->nome . ' removido com sucesso']);
    }
}
