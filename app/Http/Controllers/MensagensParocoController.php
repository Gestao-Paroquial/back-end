<?php

namespace App\Http\Controllers;

use App\MensagensParoco;
use Illuminate\Http\Request;

class MensagensParocoController extends Controller
{
  
    public function index()
    {
        return response()->json(MensagensParoco::all());
    }

    public function store(Request $request)
    {
        $mensagensParoco = MensagensParoco::create($request->all());
        return response()->json(['message'=>'Adicionado com sucesso']);
    }


    public function show($id)
    {
        $mensagensParoco = MensagensParoco::findOrFail($id);
        return response()->json($mensagensParoco);
    }
 
    public function update(Request $request, $id)
    {
        $mensagensParoco = MensagensParoco::findOrFail($id);
        $mensagensParoco->fill($request->all());
        $mensagensParoco->save();
        return response()->json(['message'=>'Alterado com sucesso']);
    }
    
    public function destroy($id)
    {
        $mensagensParoco = MensagensParoco::findOrFail($id);
        $mensagensParoco->delete();
        return response()->json(['message'=>'Removido com sucesso']);
    }
}
