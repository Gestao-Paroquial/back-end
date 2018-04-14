<?php

namespace App\Http\Controllers;

use App\Ata;
use Illuminate\Http\Request;

class AtasController extends Controller
{
    public function index()
    {
        $Ata = new Ata();

        $result = $Ata->with('detalhes')->get();
        return $result;
    }
    public function show($id)
    {
        $Ata = new Ata();

        $result = $Ata->with('detalhes')->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request)
    {
        $Ata = Ata::create($request->all());
        return response()->json($Ata);
    }
    public function update(Request $request, $id)
    {
        $Ata = Ata::findOrFail($id);
        $Ata->fill($request->all());
        $Ata->save();
        return response()->json($Ata);
    }
    public function destroy($id)
    {
        $Ata = Ata::findOrFail($id);
        $Ata->delete();
        return response()->json(['message' => 'removido com sucesso']);
    }
}
