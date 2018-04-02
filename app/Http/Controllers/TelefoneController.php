<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
  
    public function index()
    {
        return response()->json(Telefone::all());
    }

    public function store(Request $request)
    {
        $telefone = Telefone::create($request->all());
        return response()->json($telefone);
    }


    public function show($id)
    {
        $telefone = Telefone::findOrFail($id);
        return response()->json($telefone);
    }
 
    public function update(Request $request, $id)
    {
        $telefone = Telefone::findOrFail($id);
        $telefone->fill($request->all());
        $telefone->save();
        return response()->json($telefone);
    }
    
    public function destroy($id)
    {
        $telefone = Telefone::findOrFail($id);
        $telefone->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
