<?php

namespace App\Http\Controllers;
use App\Doacoe;
use Illuminate\Http\Request;

class DoacoesController extends Controller
{
    public function index(){
        $Doacoe = new Doacoe();

        $result = $Doacoe->with('comunidade:id,nome')->get();
        return $result;
    }
    public function show($id){
        $Doacoe = new Doacoe();
        
        $result = $Doacoe->with('comunidade:id,nome')->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request){
        $Doacoe = Doacoe::create($request->all());
        return response()->json($Doacoe);
    }
    public function update(Request $request, $id){
        $Doacoe = Doacoe::findOrFail($id);
        $Doacoe->fill($request->all());
        $Doacoe->save();
        return response()->json($Doacoe);
    }
    public function destroy($id){
        $Doacoe = Doacoe::findOrFail($id);
        $Doacoe->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
