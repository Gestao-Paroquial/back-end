<?php

namespace App\Http\Controllers;

use App\Comunidade;
use App\Telefone;
use Illuminate\Http\Request;

class ComunidadesController extends Controller
{
    public function index()
    {
        $comunidade = new comunidade();

        $result = $comunidade->with(['telefones:id,classe_telefone_id,id_entidade,telefone', 'membros:membros.id,membros.nome', 'doacoes', 'pastorais:id,comunidade_id,nome'])->get();
        return $result;
    }
    public function show($id)
    {
        $comunidade = new comunidade();

        $result = $comunidade->with(['telefones:id,classe_telefone_id,id_entidade,telefone', 'membros:membros.id,membros.nome', 'pastorais:id,comunidade_id,nome'])->where('id', $id)->first();
        return $result;
    }
    public function store(Request $request)
    {
        $comunidade = Comunidade::create($request->all());
        foreach ($request->telefones as $telefone) {
            $telefone["id_entidade"] = $comunidade->id;
            $telefone["classe_telefone_id"] = $comunidade->classe_telefone_id;
            Telefone::create($telefone);
        }
        return response()->json(['message' => $comunidade->nome . ' adicionada com sucesso']);
    }
    public function update(Request $request, $id)
    {
        $comunidade = Comunidade::findOrFail($id);
        $comunidade->fill($request->all());
        $comunidade->save();
        foreach ($request->telefones as $telefone) {
            if (!isset($telefone["id"])) {
                $telefone["id_entidade"] = $comunidade->id;
                $telefone["classe_telefone_id"] = $comunidade->classe_telefone_id;
                Telefone::create($telefone);
            } else {
                $modelTelefone = Telefone::findOrFail($telefone["id"]);
                $modelTelefone->fill($telefone);
                $modelTelefone->save();
            }
        }

        return response()->json(['message' => $comunidade->nome . ' alterada com sucesso']);
    }
    public function destroy($id)
    {
        $comunidade = Comunidade::findOrFail($id);
        $comunidade->delete();
        return response()->json(['message' => $comunidade->nome . ' removida com sucesso']);
    }
}
