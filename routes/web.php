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
use App\Item;
use App\Stock;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stock', 'StockController');

Route::get('/items/{item}', 'ItemController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items', 'StockController@tableshow')->name('search');

Route::get('/crear', 'ItemController@create')->name('crear');

Route::post('/crear', 'ItemController@store')->name('store');

Route::get('/items/{item}/editar', 'StockController@edit')->name('editar');

//Route::patch('/items/{item}', 'StockController@update')->name('actualizar');

//{{action('StockController@update', $stock->id)}}