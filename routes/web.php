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
        Route::get('/ver-producto/{id}', 'AdminClient\ProductController@showProduct')->name('product.show');
        Route::get('/agregar-producto', 'AdminClient\ProductController@addProduct')->name('product.add');
        Route::post('/nuevo-producto', 'AdminClient\ProductController@upgradeProduct')->name('product.upgrade');
        Route::get('/editar-producto/{id}', 'AdminClient\ProductController@editProduct')->name('product.edit');
        Route::post('/actualizar-producto/{id}', 'AdminClient\ProductController@updateProduct')->name('product.update');
        Route::get('/eliminar-producto/{id}', 'AdminClient\ProductController@deleteProduct')->name('product.delete');
        Route::get('/publicar-producto/{id}', 'AdminClient\ProductController@postProduct')->name('product.post');
        Route::get('/despublicar-producto/{id}', 'AdminClient\ProductController@unpostProduct')->name('product.unpost');
        Route::post('/agregar-stock/{id}', 'AdminClient\ProductController@addStockProduct')->name('product.addStock');
    });

    Route::get('/perfil-tienda', 'AdminClient\ShopController@editShop')->name('shop.edit');
    Route::post('/actualizar-tienda/{id}', 'AdminClient\ShopController@updateShop')->name('shop.update');
    
    Route::get('/listado-proveedores', 'AdminClient\ProviderController@listProvider')->name('list.provider');
    Route::get('/editar-proveedor/{id}', 'AdminClient\ProviderController@editProvider')->name('edit.provider');
    Route::post('/actualizar-proveedor/{id}', 'AdminClient\ProviderController@updateProvider')->name('update.provider');
    Route::view('/agregar-proveedor', 'web.adminUser.providers.addProvider')->name('add.provider');
    Route::post('/nuevo-proveedor', 'AdminClient\ProviderController@upgradeProvider')->name('upgrade.provider');
    Route::get('/eliminar-proveedor/{id}', 'AdminClient\ProviderController@deleteProvider')->name('delete.provider');

    Route::get('/listado-clientes', 'AdminClient\ClientController@listClient')->name('list.client');
    Route::get('/agregar-clientes', 'AdminClient\ClientController@addNewClient')->name('addNew.client');
    Route::get('/actualizar-clientes/{id}', 'AdminClient\ClientController@editClient')->name('edit.client');
    Route::post('/upgrede-clientes/{id}', 'AdminClient\ClientController@upgradeClient')->name('upgrade.client');
    Route::get('/eliminar-clientes/{id}', 'AdminClient\ClientController@deleteClient')->name('delete.client');
});
