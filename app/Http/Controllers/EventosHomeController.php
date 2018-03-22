<?php

namespace App\Http\Controllers;

use App\EventosHome;
use Illuminate\Http\Request;

class EventosHomeController extends Controller
{
    public function index()
    {
        return response()->json(EventosHome::all());
    }

    public function store(Request $request)
    {
        $eventosHome = EventosHome::create($request->all());
        return response()->json($eventosHome);
    }

    public function show($id)
    {
        $eventosHome = EventosHome::findOrFail($id);
        return response()->json($eventosHome);
    }

    public function update(Request $request, $id)
    {
        $eventosHome = EventosHome::findOrFail($id);
        $eventosHome->fill($request->all());
        $eventosHome->save();
        return response()->json($eventosHome);
    }

    public function destroy($id)
    {
        $eventosHome = EventosHome::findOrFail($id);
        $filePath = public_path() . $eventosHome->imagem;
        if(file_exists($filePath)){
            unlink($filePath);
        }
        $eventosHome->delete();
        return response()->json(['message' => 'removido com sucesso']);
    }
}
