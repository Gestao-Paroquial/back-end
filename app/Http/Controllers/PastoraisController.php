<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pastorais;

class PastoraisController extends Controller
{
    public function index(){
        return response()->json(Pastorais::all());
    }
    public function show($id){
        $pastorais = Pastorais::findOrFail($id);
        return response()->json($pastorais);
    }
    public function store(Request $request){
        $pastorais = Pastorais::create($request->all());
        return response()->json($pastorais);
    }
    public function update(Request $request, $id){
        $pastorais = Pastorais::findOrFail($id);
        $pastorais->fill($request->all());
        $pastorais->save();
        return response()->json($pastorais);
    }
    public function destroy($id){
        $pastorais = Pastorais::findOrFail($id);
        $pastorais->delete();
        return response()->json(['message'=>'pastoral removida com sucesso']);
    }
}
