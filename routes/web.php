<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pertanyaan', 'PertanyaanController@index');
Route::post('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/jawaban/{id}', 'JawabanController@index')->name('jawaban.index');
Route::post('/jawaban/{id}', 'JawabanController@store');