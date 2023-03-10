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

Auth::routes();


// admin client
Route::middleware(['auth', 'UserType'])->group(function () {

    Route::middleware('ProfileOwner')->group(function () {
        Route::get('/dashboard', 'AdminClient\DashboardController@index')->name('dashboard.index');

        Route::post('/agregar-cliente', 'AdminClient\ClientController@addClient')->name('client.add');

        Route::get('/listado-producto', 'AdminClient\ProductController@listProduct')->name('product.list');
        Route::get('/agregar-producto', 'AdminClient\ProductController@addProduct')->name('product.add');
        Route::get('/eliminar-producto/{id}', 'AdminClient\ProductController@deleteProduct')->name('product.delete');
    });

    Route::get('/perfil-tienda', 'AdminClient\ShopController@editShop')->name('shop.edit');
    Route::post('/actualizar-tienda/{id}', 'AdminClient\ShopController@updateShop')->name('shop.update');


});
