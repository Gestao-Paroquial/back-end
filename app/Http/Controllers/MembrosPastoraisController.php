<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembrosPastoraisController extends Controller
{
    public function index(){
        return response()->json(MembrosPastorais::all());
    }
    public function show($id){
        $membrosPastorais = MembrosPastorais::findOrFail($id);
        return response()->json($membrosPastorais);
    }
    public function store(Request $request){
        $membrosPastorais = MembrosPastorais::create($request->all());
        return response()->json($membrosPastorais);
    }
    public function update(Request $request, $id){
        $membrosPastorais = MembrosPastorais::findOrFail($id);
        $membrosPastorais->fill($request->all());
        $membrosPastorais->save();
        return response()->json($membrosPastorais);
    }
    public function destroy($id){
        $membrosPastorais = Comunidades::findOrFail($id);
        $membrosPastorais->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
