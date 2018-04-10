<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('foo', function () {
        return "método GET";
    });
    Route::get('foo', function () {
        return view('bar', ['foo' => '<font color = "blue">teste</font>']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', ['uses' => 'UsersController@index']);
        Route::get('add', ['uses' => 'UsersController@create']);
        Route::post('add', ['uses' => 'UsersController@post']);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
