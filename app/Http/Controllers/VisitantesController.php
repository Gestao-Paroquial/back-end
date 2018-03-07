<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visitantes;

class VisitantesController extends Controller
{
    public function index()
    {
        $ep = new Visitantes();
        
        $result = $ep->with('comunidades')        
        ->get();

        return $result; 
        // return response()->json(Visitantes::all());
    }
    public function show($id)
    {

        $ep = new Visitantes();
        
        $result = $ep->with('comunidades')
        ->where('id', $id)
        ->first();

        return $result;

        // $visitantes = Visitantes::findOrFail($id);
        // return response()->json($visitantes);
    }
    public function store(Request $request)
    {
        $visitantes = Visitantes::create($request->all());
        return response()->json($visitantes);
    }
    public function update(Request $request, $id)
    {
        $visitantes = Visitantes::findOrFail($id);
        $visitantes->fill($request->all());
        $visitantes->save();
        return response()->json($visitantes);
    }
    public function destroy($id)
    {
        $visitantes = Visitantes::findOrFail($id);
        $visitantes->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
