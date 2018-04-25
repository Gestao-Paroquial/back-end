<?php

namespace App\Http\Controllers;

use App\Dependente;
use App\Membro;
use App\MembrosComunidade;
use App\MembrosPastorai;
use App\Telefone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
    public $with = ['telefones:id,classe_telefone_id,id_entidade,telefone', 'dependentes', 'dizimos', 'comunidades:comunidades.id,comunidades.nome', 'pastorais:pastorais.id,nome', 'tipoMembro:descricao,id'];

    public function index()
    {
        $membro = new Membro();

        $result = $membro->with($this->with)->get();

        return $result;
    }
    public function show($id)
    {
        $membro = new Membro();

        $result = $membro->with($this->with)->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request)
    {
        $membro = Membro::create($request->all());

        $this->salvarOuAlterarPropriedades($request, $membro);

        return response()->json(['message' => $membro->nome . ' adicionado com sucesso']);
    }
    public function update(Request $request, $id)
    {
        $membro = membro::findOrFail($id);
        $membro->fill($request->all());
        $membro->save();

        $this->salvarOuAlterarPropriedades($request, $membro);

        $getIds = function ($item) {
            if (isset($item['id'])) {
                return $item['id'];
            }

        };

        $todosOsIdsDasPastorais = array_map($getIds, $request->pastorais);

        $pastoraisQuePrecisamSerRemovidasDesteUsuario = MembrosPastorai::where("membro_id", $membro->id)
            ->whereNotIn('pastorai_id', $todosOsIdsDasPastorais)
            ->delete();

        $todosOsIdsDasComunidades = array_map($getIds, $request->comunidades);

        $comunidadesQuePrecisamSerRemovidasDesteUsuario = MembrosComunidade::where("membro_id", $membro->id)
            ->whereNotIn('comunidade_id', $todosOsIdsDasComunidades)
            ->delete();

        return response()->json(['message' => $membro->nome . ' alterado com sucesso']);
    }
    public function destroy($id)
    {
        $membro = membro::findOrFail($id);
        $membro->delete();
        return response()->json(['message' => $membro->nome . ' removido com sucesso']);
    }
    public function aniversariantesDoMes($month)
    {
        $membros = new Membro();

        $result = $membros
            ->whereMonth('data_Nascimento', '=', $month)
            ->get();
        return $result;
    }
    public function salvarOuAlterarPropriedades($request, $membro)
    {
        $this->salvarOuAlterarTelefones($request->telefones, $membro);
        $this->salvarOuAlterarDependentes($request->dependentes, $membro);
        $this->salvarComunidades($request->comunidades, $membro);
        $this->salvarPastorais($request->pastorais, $membro);
    }
    public function salvarOuAlterarTelefones($telefones, $membro)
    {
        foreach ($telefones as $telefone) {
            if (!isset($telefone["id"])) {
                $telefone["id_entidade"] = $membro->id;
                $telefone["classe_telefone_id"] = $membro->classe_telefone_id;
                Telefone::create($telefone);
            } else {
                $modelTelefone = Telefone::findOrFail($telefone["id"]);
                $modelTelefone->fill($telefone);
                $modelTelefone->save();
            }
        }
    }
    public function salvarOuAlterarDependentes($dependentes, $membro)
    {
        foreach ($dependentes as $dependente) {
            if (!isset($dependente["id"])) {
                $dependente["membro_id"] = $membro->id;
                Dependente::create($dependente);
            } else {
                $modelDependente = Dependente::findOrFail($dependente["id"]);
                $modelDependente->fill($dependente);
                $modelDependente->save();
            }
        }
    }
    public function salvarPastorais($pastorais, $membro)
    {
        foreach ($pastorais as $pastoral) {
            if (!isset($pastoral["id"])) {
                $pastoral["membro_id"] = $membro->id;
                MembrosPastorai::create($pastoral);
            }
        }
    }
    public function salvarComunidades($comunidades, $membro)
    {
        foreach ($comunidades as $comunidade) {
            if (!isset($comunidade["id"])) {
                $comunidade["membro_id"] = $membro->id;
                MembrosComunidade::create($comunidade);
            }
        }
    }
    public function relatorioAgrupadoPorTipo()
    {
        
        $result = DB::table('membros')
        ->join('tipo_membros', 'membros.tipo_membro_id', '=', 'tipo_membros.id')
        ->select( DB::raw('COUNT(membros.id) as quantidade, descricao'))
        ->groupBy('descricao')
        ->get();
        
        return $result;
    }
    public function count(){
        $count = Membro::all()->count();
        return response()->json(['quantidade' => $count]);
    }
}
