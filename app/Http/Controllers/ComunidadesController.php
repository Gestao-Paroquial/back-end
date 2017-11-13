<?php

namespace App\Http\Controllers;
use App\Comunidades;
use Illuminate\Http\Request;

class ComunidadesController extends Controller
{
    public function index(){
        return response()->json(Comunidades::all());
    }
    public function show($id){
        $comunidades = Comunidades::findOrFail($id);
        return response()->json($comunidades);
    }
    public function store(Request $request){
        $comunidades = Comunidades::create($request->all());
        return response()->json($comunidades);
    }
    public function update(Request $request, $id){
        $comunidades = Comunidades::findOrFail($id);
        $comunidades->fill($request->all());
        $comunidades->save();
        return response()->json($comunidades);
    }
    public function destroy($id){
        $comunidades = Comunidades::findOrFail($id);
        $comunidades->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
