<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pastorais;

use App\Comunidades;

class PastoraisController extends Controller
{
    public function index()
    {
        $ep = new Pastorais();
        
        $result = $ep->with('comunidade')        
        ->get();

        return $result; 

        // return response()->json(Pastorais::all());
    }
    public function show($id)
    {
        // $pastorais = Pastorais::findOrFail($id);

        
        $ep = new Pastorais();
        
        $result = $ep->with('comunidade')
        ->where('id', $id)
        ->first();

        return $result; 
        // return response()->json($pastorais);
    }
    public function store(Request $request)
    {
        $pastorais = Pastorais::create($request->all());        
        return response()->json($pastorais);
    }
    public function update(Request $request, $id)
    {
        $pastorais = Pastorais::findOrFail($id);
        $pastorais->fill($request->all());
        $pastorais->save();
        return response()->json($pastorais);
    }
    public function destroy($id)
    {
        $pastorais = Pastorais::findOrFail($id);
        $pastorais->delete();
        return response()->json(['message'=>'pastoral removida com sucesso']);
    }
}
