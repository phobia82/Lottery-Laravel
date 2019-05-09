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
Route::get('/eventos', 'EventoController@index')->name('eventos')->middleware('auth');
Route::get('/eventos/{id}', 'EventoController@show')->name('evento')->middleware('auth');
Route::put('/cards/select/', 'CardController@update')->name('card')->middleware('auth');
Route::get('/cards', 'CardController@index')->name('cards')->middleware('auth');

