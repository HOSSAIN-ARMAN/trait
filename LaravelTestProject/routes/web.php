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

Route::get('/product/add-product',[
   'uses' => 'ProductController@addProduct',
    'as'  => 'add-product'
]);
Route::post('/product/new-product',[
    'uses' => 'ProductController@insertProduct',
    'as'   => 'new-product'
]);
//================================= this is for product ===================
Route::get('product/product-info', 'ProductController@productInfo')->name('product-info');
Route::get('product/edit-product/{id}', 'ProductController@editProduct')->name('edit-product');
Route::post('product/update-product', 'ProductController@updateProduct')->name('update-product');
Route::get('product/delete-product/{id}', 'ProductController@deleteProduct')->name('delete-product');
//================================= this is for production ==========================

Route::get('product/add-production', 'ProductionController@addProduction')->name('add-production');
Route::post('product/new-production', 'ProductionController@insertProduction')->name('new-production');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


