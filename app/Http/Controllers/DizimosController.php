<?php

namespace App\Http\Controllers;
use App\Dizimo;
use Illuminate\Http\Request;

class DizimosController extends Controller
{
    public function index(){
        $Dizimo = new Dizimo();

        $result = $Dizimo->with('membro:id,nome')->get();
        return $result;
    }
    public function show($id){
        $Dizimo = new Dizimo();
        
        $result = $Dizimo->with('membro:id,nome')->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $Dizimo = Dizimo::create($request->all());
        return response()->json($Dizimo);
    }
    public function update(Request $request, $id){
        $Dizimo = Dizimo::findOrFail($id);
        $Dizimo->fill($request->all());
        $Dizimo->save();
        return response()->json($Dizimo);
    }
    public function destroy($id){
        $Dizimo = Dizimo::findOrFail($id);
        $Dizimo->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
