<?php

namespace App\Http\Controllers;

use App\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
  
    public function index()
    {
        return response()->json(TipoEvento::all());
    }

    public function store(Request $request)
    {
        $tipoEvento = TipoEvento::create($request->all());
        return response()->json(['message'=>'Adicionado com sucesso']);
    }


    public function show($id)
    {
        $tipoEvento = TipoEvento::findOrFail($id);
        return response()->json($tipoEvento);
    }
 
    public function update(Request $request, $id)
    {
        $tipoEvento = TipoEvento::findOrFail($id);
        $tipoEvento->fill($request->all());
        $tipoEvento->save();
        return response()->json(['message'=>'Alterado com sucesso']);
    }
    
    public function destroy($id)
    {
        $tipoEvento = TipoEvento::findOrFail($id);
        $tipoEvento->delete();
        return response()->json(['message'=>'Removido com sucesso']);
    }
}
