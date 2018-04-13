<?php

namespace App\Http\Controllers;

use App\TipoMembro;
use Illuminate\Http\Request;

class TipoMembroController extends Controller
{
  
    public function index()
    {
        return response()->json(TipoMembro::all());
    }

    public function store(Request $request)
    {
        $tipoMembro = TipoMembro::create($request->all());
        return response()->json(['message'=>'Adicionado com sucesso', "tipo"=>$tipoMembro]);
    }


    public function show($id)
    {
        $tipoMembro = TipoMembro::findOrFail($id);
        return response()->json($tipoMembro);
    }
 
    public function update(Request $request, $id)
    {
        $tipoMembro = TipoMembro::findOrFail($id);
        $tipoMembro->fill($request->all());
        $tipoMembro->save();
        return response()->json(['message'=>'Alterado com sucesso']);
    }
    
    public function destroy($id)
    {
        $tipoMembro = TipoMembro::findOrFail($id);
        $tipoMembro->delete();
        return response()->json(['message'=>'Removido com sucesso']);
    }
}
