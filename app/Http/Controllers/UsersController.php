<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $users = ['Magrus', 'Russai', 'João Torador'];
        return view('index', compact('user'));
    }
    public function show($id){
        return view('user.show', compact('id'));
    }
    public function create(){
    	return view('user.create');
    }
    public function usuario(){
        $users = DB::table('users')->get();
        return view('user.usuario',['users' => $users]);
    }
    public function post(Request $request){
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:4']
        ]);
        //var_dump($request->all());
        //retornar valor do form: var_dump($request->input('email'));
        //retornar valor do form em forma de lista: var_dump($request->only('email'));        
    }
}
