<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendasController extends Controller
{
    public function index(){
        $agenda = new Agenda();

        $result = $agenda->with(['casamento:id,agenda_id,nomeNoivo,dataNascNoivo,nomeNoiva,dataNascNoiva','batismo:id,agenda_id,nomeBatizando,dataNascimento'])->get();
        return $result;
    }
    public function show($id){
        $agenda = new Agenda();
        
        $result = $agenda->with(['casamento:id,agenda_id,nomeNoivo,dataNascNoivo,nomeNoiva,dataNascNoiva','batismo:id,agenda_id,nomeBatizando,dataNascimento'])->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $agenda = Agenda::create($request->all());

        return response()->json(['message'=> $agenda->titulo.' adicionado com sucesso']);
    }
    public function update(Request $request, $id){
        $agenda = Agenda::findOrFail($id);
        $agenda->fill($request->all());
        $agenda->save();
        
        return response()->json(['message'=> $agenda->titulo.' alterado com sucesso']);
    }
    public function destroy($id){
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        
        return response()->json(['message'=> $agenda->titulo.' removido com sucesso']);
    }
}
