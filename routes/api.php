<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('uploadImagem', ['uses' => 'ImagesController@save']);
Route::resource('agenda', 'AgendasController');
Route::resource('atas', 'AtasController');
Route::resource('batismos', 'BatismosController');
Route::resource('casamentos', 'CasamentosController');
Route::resource('comunidades', 'ComunidadesController');
Route::resource('dizimos', 'DizimosController');
Route::resource('doacoes', 'DoacoesController');
Route::resource('eventosHome', 'EventosHomeController');
Route::resource('membros', 'MembrosController');
Route::resource('mensagensParoco', 'MensagensParocoController');
Route::resource('note', 'NoteController');
Route::resource('pastorais', 'PastoraisController');
