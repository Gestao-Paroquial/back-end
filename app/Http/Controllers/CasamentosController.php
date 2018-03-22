<?php

namespace App\Http\Controllers;
use App\Casamento;
use Illuminate\Http\Request;

class CasamentosController extends Controller
{
    public function index(){
        $Casamento = new Casamento();

        $result = $Casamento->with('agenda:id,data_evento,hora_evento,titulo')->get();
        return $result;
    }
    public function show($id){
        $Casamento = new Casamento();
        
        $result = $Casamento->with('agenda:id,data_evento,hora_evento,titulo')->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $Casamento = Casamento::create($request->all());
        return response()->json($Casamento);
    }
    public function update(Request $request, $id){
        $Casamento = Casamento::findOrFail($id);
        $Casamento->fill($request->all());
        $Casamento->save();
        return response()->json($Casamento);
    }
    public function destroy($id){
        $Casamento = Casamento::findOrFail($id);
        $Casamento->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
