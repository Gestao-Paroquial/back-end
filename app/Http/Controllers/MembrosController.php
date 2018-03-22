<?php

namespace App\Http\Controllers;

use App\Membro;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
     public function index(){
        $membro = new membro();

        $result = $membro->with(['telefones:id,classe_telefone_id,id_entidade,telefone','dependentes','dizimos','comunidade:id,nome','pastorais:pastorais.id,nome'])->get();
        
        return $result;
    }
    public function show($id){
        $membro = new membro();
        
        $result = $membro->with(['telefones:id,classe_telefone_id,id_entidade,telefone','dependentes','dizimos','comunidade:id,nome','pastorais:pastorais.id,nome'])->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $membro = membro::create($request->all());
        return response()->json($membro);
    }
    public function update(Request $request, $id){
        $membro = membro::findOrFail($id);
        $membro->fill($request->all());
        $membro->save();
        return response()->json($membro);
    }
    public function destroy($id){
        $membro = membro::findOrFail($id);
        $membro->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
