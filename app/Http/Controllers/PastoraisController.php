<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pastorai;

use App\Comunidade;

class PastoraisController extends Controller
{
    public function index()
    {
       $ep = new Pastorai();
       
       $result = $ep->with(['comunidade:id,nome','telefones:id,classe_telefone_id,id_entidade,telefone','coordenador:id,nome','membros:membros.id,nome'])->get();

        return $result; 

    }

    public function show($id)
    {
        $ep = new Pastorai();
        
        $result = $ep->with(['comunidade:id,nome','telefones:id,classe_telefone_id,id_entidade,telefone','coordenador:id,nome','membros:membros.id,nome'])->where('id', $id)->first();

        return $result; 
        // return response()->json($pastorai);
    }

    public function store(Request $request)
    {
        $pastorai = Pastorai::create($request->all());        
        return response()->json($pastorai);
    }

    public function update(Request $request, $id)
    {
        $pastorai = Pastorai::findOrFail($id);
        $pastorai->fill($request->all());
        $pastorai->save();
        return response()->json($pastorai);
    }

    public function destroy($id)
    {
        $pastorai = Pastorai::findOrFail($id);
        $pastorai->delete();
        return response()->json(['message'=>'pastoral removida com sucesso']);
    }
}
