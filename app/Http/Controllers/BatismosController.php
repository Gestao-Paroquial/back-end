<?php

namespace App\Http\Controllers;

use App\Batismo;
use Illuminate\Http\Request;

class BatismosController extends Controller
{
    public function index()
    {
        $Batismo = new Batismo();

        $result = $Batismo->with('agenda:id,data_evento,hora_evento,titulo')->get();
        return $result;
    }
    public function show($id)
    {
        $Batismo = new Batismo();

        $result = $Batismo->with('agenda:id,data_evento,hora_evento,titulo')->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request)
    {
        $Batismo = Batismo::create($request->all());
        return response()->json($Batismo);
    }
    public function update(Request $request, $id)
    {
        $Batismo = Batismo::findOrFail($id);
        $Batismo->fill($request->all());
        $Batismo->save();
        return response()->json($Batismo);
    }
    public function destroy($id)
    {
        $Batismo = Batismo::findOrFail($id);
        $Batismo->delete();
        return response()->json(['message' => 'removido com sucesso']);
    }
}
