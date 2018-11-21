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

/*
Front End Routes
 All Product related front end  Routes
*/
Route::get('/','FrontEnd\PagesController@index')->name('index');
Route::get('/contact','FrontEnd\PagesController@contact')->name('contact');


/*
Product Routes
 All Product related Routes
*/

Route::get('/products','FrontEnd\ProductsController@index')->name('products');
Route::get('/products/{slug}','FrontEnd\ProductsController@show')->name('products.show');

/*
 Admin Routes
 All Admin and Product  Routes
*/

Route::group(['prefix' =>'admin'],function(){

Route::get('/','BackEnd\PagesController@index')->name('admin.index');
//product Routes
  Route::group(['prefix' =>'/products'],function(){
    Route::get('/','BackEnd\ProductsController@index')->name('admin.products');



    Route::get('/create','BackEnd\ProductsController@create')->name('admin.product.create');

    Route::post('/store','BackEnd\ProductsController@store')->name('admin.product.store');


    Route::get('/edit/{id}','BackEnd\ProductsController@edit')->name('admin.product.edit');

    Route::post('/update/{id}','BackEnd\ProductsController@update')->name('admin.product.update');

    Route::post('/delete/{id}','BackEnd\ProductsController@delete')->name('admin.product.delete');

    });


});

// End of Admin

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
