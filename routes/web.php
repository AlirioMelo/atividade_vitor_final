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


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Album de fotos
Route::get('/album', 'AlbumController@index')->name('albums');

Route::get('/album/formulario_salvar', 'AlbumController@create')->name('form_salvar_album');

Route::post('/album/salvar', 'AlbumController@store')->name('salvar_album');

Route::get('/album/formulario_atualizar/{id}', 'AlbumController@edit')->name('form_atualizar_album');

Route::post('/album/atualizar', 'AlbumController@update')->name('atualizar_album');

Route::post('/album/apagar/', 'AlbumController@destroy')->name('apagar_album');

//Fotos
Route::get('/fotos', 'FotoController@index')->name('fotos');

Route::get('/fotos/formulario_salvar', 'FotoController@create')->name('form_salvar_foto');

Route::post('/fotos/salvar', 'FotoController@store')->name('salvar_foto');

Route::get('/fotos/formulario_atualizar/{id}', 'FotoController@edit')->name('form_atualizar_fotos');

Route::post('/fotos/atualizar', 'FotoController@update')->name('atualizar_foto');

Route::post('/fotos/apagar/', 'FotoController@destroy')->name('apagar_foto');


