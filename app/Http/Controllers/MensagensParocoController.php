<?php

namespace App\Http\Controllers;

use App\Http\Services\FCMService;
use App\MensagensParoco;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelFCM\Message\PayloadDataBuilder;

class MensagensParocoController extends Controller
{

    public function index()
    {
        $mensagensParoco = new MensagensParoco();

        $result = $mensagensParoco
                    ->with('user:id,name')
                    ->get();
        return $result;
    }

    public function paginacao()
    {
        return response()->json(DB::table('mensagens_parocos')->paginate(15));
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        $request->merge(['user_id' => $user->id]);
        $mensagensParoco = MensagensParoco::create($request->all());
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['click_action' => 'MensagemParocoActivity']);
        $data = $dataBuilder->build();
        FCMService::sendPushNotificationToTopic($mensagensParoco->titulo, $mensagensParoco->mensagem, 'all', $data);
        return response()->json(['message' => 'Adicionado com sucesso']);
    }

    public function show($id)
    {
        $mensagensParoco = MensagensParoco::findOrFail($id);
        return response()->json($mensagensParoco);
    }

    public function update(Request $request, $id)
    {
        $mensagensParoco = MensagensParoco::findOrFail($id);
        $mensagensParoco->fill($request->all());
        $mensagensParoco->save();
        return response()->json(['message' => 'Alterado com sucesso']);
    }

    public function destroy($id)
    {
        $mensagensParoco = MensagensParoco::findOrFail($id);
        $mensagensParoco->delete();
        return response()->json(['message' => 'Removido com sucesso']);
    }
}
