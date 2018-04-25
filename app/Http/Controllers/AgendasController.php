<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Agenda;
use Illuminate\Http\Request;

class AgendasController extends Controller
{
    public function index()
    {
        $agenda = new Agenda();

        $result = $agenda->with(['casamento:id,agenda_id,nomeNoivo,dataNascNoivo,nomeNoiva,dataNascNoiva', 'batismo:id,agenda_id,nomeBatizando,dataNascimento'])->get();
        return $result;
    }
    public function show($id)
    {
        $agenda = new Agenda();

        $result = $agenda->with(['casamento:id,agenda_id,nomeNoivo,dataNascNoivo,nomeNoiva,dataNascNoiva', 'batismo:id,agenda_id,nomeBatizando,dataNascimento', 'comunidade:id,nome', 'tipoEvento:id,descricao'])->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request)
    {
        $agenda = Agenda::create($request->all());

        return response()->json(['message' => $agenda->titulo . ' adicionado com sucesso']);
    }
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->fill($request->all());
        $agenda->save();

        return response()->json(['message' => $agenda->titulo . ' alterado com sucesso']);
    }
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return response()->json(['message' => $agenda->titulo . ' removido com sucesso']);
    }
    public function relatorioAgrupadoPorTipo($dateFilter)
    {
        
        $result = DB::table('agendas')
        ->join('tipo_eventos', 'agendas.tipo_evento_id', '=', 'tipo_eventos.id')
        ->select( DB::raw('COUNT(agendas.id) as quantidade, tipo_eventos.descricao'))
        ->where('agendas.data_inicio_evento', '>=', $dateFilter.' 00:00:00')
        ->groupBy('descricao')
        ->get();
        
        return $result;
    }
}
