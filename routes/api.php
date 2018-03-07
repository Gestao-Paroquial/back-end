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
Route::resource('note', 'NoteController');
Route::resource('pastorais', 'PastoraisController');
Route::resource('comunidades', 'ComunidadesController');
Route::resource('visitantes', 'VisitantesController');
Route::resource('membrosPastorais', 'MembrosPastoraisController');
Route::resource('mensagensParoco', 'MensagensParocoController');
Route::resource('eventosHome', 'EventosHomeController');
Route::resource('user', 'UsersController');

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