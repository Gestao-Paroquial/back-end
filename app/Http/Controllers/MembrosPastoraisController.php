<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MembrosPastorais;

class MembrosPastoraisController extends Controller
{
    public function index()
    {

        $ep = new MembrosPastorais();
        
        $result = $ep->with('pastorais')        
        ->get();

        return $result; 

        // return response()->json(MembrosPastorais::all());
    }
    public function show($id)
    {
        $ep = new MembrosPastorais();
        
        $result = $ep->with('pastorais')
        ->where('id', $id)
        ->first();

        return $result; 
        // $membrosPastorais = MembrosPastorais::findOrFail($id);
        // return response()->json($membrosPastorais);
    }
    public function store(Request $request)
    {
        $membrosPastorais = MembrosPastorais::create($request->all());
        return response()->json($membrosPastorais);
    }
    public function update(Request $request, $id)
    {
        $membrosPastorais = MembrosPastorais::findOrFail($id);
        $membrosPastorais->fill($request->all());
        $membrosPastorais->save();
        return response()->json($membrosPastorais);
    }
    public function destroy($id)
    {
        $membrosPastorais = Comunidades::findOrFail($id);
        $membrosPastorais->delete();
        return response()->json(['message'=>'removido com sucesso']);
    }
}
