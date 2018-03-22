<?php

namespace App\Http\Controllers;
use App\Comunidade;
use Illuminate\Http\Request;

class ComunidadesController extends Controller
{
    public function index(){
        $comunidade = new comunidade();

        $result = $comunidade->with(['telefones:id,classe_telefone_id,id_entidade,telefone','doacoes','pastorais:id,comunidade_id,nome'])->get();
        return $result;
    }
    public function show($id){
        $comunidade = new comunidade();
        
        $result = $comunidade->with(['telefones:id,classe_telefone_id,id_entidade,telefone','pastorais:id,comunidade_id,nome'])->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $comunidade = Comunidade::create($request->all());
        return response()->json($comunidade);
    }
    public function update(Request $request, $id){
        $comunidade = Comunidade::findOrFail($id);
        $comunidade->fill($request->all());
        $comunidade->save();
        return response()->json($comunidade);
    }
    public function destroy($id){
        $comunidade = Comunidade::findOrFail($id);
        $comunidade->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
