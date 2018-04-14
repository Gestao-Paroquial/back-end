<?php

namespace App\Http\Controllers;

use App\Pastorai;
use App\Telefone;
use Illuminate\Http\Request;

class PastoraisController extends Controller
{
    public function index()
    {
        $ep = new Pastorai();

        $result = $ep->with(['comunidade:id,nome', 'telefones:id,classe_telefone_id,id_entidade,telefone', 'coordenador:id,nome', 'membros:membros.id,nome'])->get();

        return $result;

    }

    public function show($id)
    {
        $ep = new Pastorai();

        $result = $ep->with(['comunidade:id,nome', 'telefones:id,classe_telefone_id,id_entidade,telefone', 'coordenador:id,nome', 'membros:membros.id,nome'])->where('id', $id)->first();

        return $result;
    }

    public function store(Request $request)
    {
        $pastorai = Pastorai::create($request->all());

        foreach ($request->telefones as $telefone) {
            $telefone["id_entidade"] = $pastorai->id;
            $telefone["classe_telefone_id"] = $pastorai->classe_telefone_id;
            Telefone::create($telefone);
        }

        return response()->json(['message' => $pastorai->nome . ' adicionada com sucesso']);
    }

    public function update(Request $request, $id)
    {
        $pastorai = Pastorai::findOrFail($id);
        $pastorai->fill($request->all());
        $pastorai->save();

        foreach ($request->telefones as $telefone) {
            if (!isset($telefone["id"])) {
                $telefone["id_entidade"] = $pastorai->id;
                $telefone["classe_telefone_id"] = $pastorai->classe_telefone_id;
                Telefone::create($telefone);
            } else {
                $modelTelefone = Telefone::findOrFail($telefone["id"]);
                $modelTelefone->fill($telefone);
                $modelTelefone->save();
            }
        }

        return response()->json(['message' => $pastorai->nome . ' alterado com sucesso']);
    }

    public function destroy($id)
    {
        $pastorai = Pastorai::findOrFail($id);
        $pastorai->delete();
        return response()->json(['message' => $pastorai->nome . ' removida com sucesso']);
    }
}
