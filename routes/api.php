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

Route::post('uploadImagem', ['uses' => 'ImagesController@save']);
Route::resource('agenda', 'AgendasController');
Route::resource('atas', 'AtasController');
Route::resource('batismos', 'BatismosController');
Route::resource('casamentos', 'CasamentosController');
Route::resource('comunidades', 'ComunidadesController');
Route::resource('dizimos', 'DizimosController');
Route::resource('doacoes', 'DoacoesController');
Route::resource('eventosHome', 'EventosHomeController');
Route::resource('user', 'UsersController');
Route::resource('tipos', 'TiposController');
Route::resource('tiposMembro', 'TipoMembroController');
Route::resource('tiposEvento', 'TipoEventoController');
Route::resource('tiposDependente', 'TipoDependenteController');
Route::resource('dependentes', 'DependenteController');
Route::resource('telefones', 'TelefoneController');

Route::get('email','MailController@casamentoMail');
Route::get('analytics', 'AnalyticsController@getData');

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

    //Rota para validar os tokens
    Route::get('validateToken', function(){
        return response()->json(['success'=>true]);
    });
});
Route::resource('membros', 'MembrosController');
Route::get('aniversariantes/{month}', 'MembrosController@aniversariantesDoMes');
Route::resource('mensagensParoco', 'MensagensParocoController');
Route::resource('note', 'NoteController');
Route::resource('pastorais', 'PastoraisController');
