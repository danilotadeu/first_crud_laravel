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


Route::resource('cidade', 'CidadeController');

Route::resource('activities', 'ActivitiesController');

Route::get('/cidade/edit/{id}', 'CidadeController@edit');
Route::get('/cidade/destroy/{id}', 'CidadeController@destroy');

Route::get('/activities/edit/{id}', 'ActivitiesController@edit');

Route::get('/activities', 'ActivitiesController@index');