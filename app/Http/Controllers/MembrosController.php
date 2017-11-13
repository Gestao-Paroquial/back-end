<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembrosController extends Controller
{
    public function index(){
        return response()->json(Membros::all());
    }
    public function show($id){
        $membros = Membros::findOrFail($id);
        return response()->json($membros);
    }
    public function store(Request $request){
        $membros = Membros::create($request->all());
        return response()->json($membros);
    }
    public function update(Request $request, $id){
        $membros = Membros::findOrFail($id);
        $membros->fill($request->all());
        $membros->save();
        return response()->json($membros);
    }
    public function destroy($id){
        $membros = Membros::findOrFail($id);
        $membros->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
