<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return response()->json(User::all('id','name', 'email', 'is_verified'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,'name' => $user->name, 'email' => $user->email, 'is_verified'=> $user->is_verified
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'removido com sucesso']);
    }
}
