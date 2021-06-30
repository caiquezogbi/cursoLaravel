<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Site\HomeController;


use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

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



Route::get('/', 'App\Http\Controllers\Site\HomeController@index')->name('site.home');


Route::get('/login', 'App\Http\Controllers\Site\LoginController@index')->name('login');
Route::post('/login/entrar', 'App\Http\Controllers\Site\LoginController@entrar')->name('site.login.entrar');
Route::get('/login/sair', 'App\Http\Controllers\Site\LoginController@sair')->name('site.login.sair');

Route::get('/contato/{id?}', ['uses' => 'App\Http\Controllers\ContatoController@index']);
Route::post('/contato/{id?}', ['uses' => 'App\Http\Controllers\ContatoController@criar']);
Route::put('/contato/{id?}', ['uses' => 'App\Http\Controllers\ContatoController@editar']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/cursos', 'App\Http\Controllers\Admin\CursoController@index')->name('admin.cursos');
    Route::get('/admin/cursos/adicionar', 'App\Http\Controllers\Admin\CursoController@adicionar')->name('admin.cursos.adicionar');
    Route::post('/admin/cursos/salvar', 'App\Http\Controllers\Admin\CursoController@salvar')->name('admin.cursos.salvar');
    Route::get('/admin/cursos/editar/{id}', 'App\Http\Controllers\Admin\CursoController@editar')->name('admin.cursos.editar');
    Route::put('/admin/cursos/atualizar/{id}', 'App\Http\Controllers\Admin\CursoController@atualizar')->name('admin.cursos.atualizar');
    Route::get('/admin/cursos/deletar/{id}', 'App\Http\Controllers\Admin\CursoController@deletar')->name('admin.cursos.deletar');
});
