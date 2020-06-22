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



Route::get('/', 'FrontController@index');
Route::get('/home', 'FrontController@index')->name('home');

Route::get('/produtos', 'FrontController@produtos')->name('produtos');

Route::get('/detalhe_produto', 'FrontController@detalhe_produto')->name('detalhe_produto');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/carrinho', 'CarrinhoController');
Route::get('/logout', 'auth\LoginController@logout');

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('produto', 'ProdutosController');

    Route::resource('categoria', 'CategoriasController');
});
