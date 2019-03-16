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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ['uses' => 'IndexController@show', 'as' => 'main']);
Route::any('/edit/{id}', ['uses' => 'IndexController@edit', 'as' => 'edit']);
Route::post('/', ['uses' => 'IndexController@add', 'as' => 'addTour']);
Route::get('/delete/{id}', ['uses' => 'IndexController@delete', 'as' => 'delete']);
