<?php

namespace App\Http\Controllers;

use App\Membro;
use App\Telefone;
use App\Dependente;
use App\MembrosComunidade;
use App\MembrosPastorai;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
     public function index(){
        $membro = new Membro();

        $result = $membro->with(['telefones:id,classe_telefone_id,id_entidade,telefone','dependentes','dizimos','comunidades:comunidades.id,comunidades.nome','pastorais:pastorais.id,nome'])->get();
        
        return $result;
    }
    public function show($id){
        $membro = new Membro();
        
        $result = $membro->with(['telefones:id,classe_telefone_id,id_entidade,telefone','dependentes','dizimos','comunidades:comunidades.id,comunidades.nome','pastorais:pastorais.id,nome'])->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $membro = Membro::create($request->all());

        foreach ($request->telefones as $telefone) {
             $telefone["id_entidade"] = $membro->id;
             $telefone["classe_telefone_id"] = $membro->classe_telefone_id;             
             Telefone::create($telefone);
        }
        
        foreach ($request->dependentes as $dependente) {
             $dependente["membro_id"] = $membro->id;             
             Dependente::create($dependente);
        }

        foreach ($request->comunidades as $comunidade) {
            $comunidade["membro_id"] = $membro->id;             
            MembrosComunidade::create($comunidade);
        }
        
        foreach ($request->pastorais as $pastoral) {
            $pastoral["membro_id"] = $membro->id;             
            MembrosPastorai::create($pastoral);
        }

        return response()->json(['message'=> $membro->nome.' adicionado com sucesso']);
    }
    public function update(Request $request, $id){
        $membro = membro::findOrFail($id);
        $membro->fill($request->all());
        $membro->save();
        return response()->json(['message'=> $membro->nome.' alterado com sucesso']);
    }
    public function destroy($id){
        $membro = membro::findOrFail($id);
        $membro->delete();
        return response()->json(['message'=> $membro->nome.' removido com sucesso']);
    }
}
