<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
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

// ALL USer Route
Route::group(['prefix' =>'user'],function(){
Route::get('/token/{token}','FrontEnd\VerificationController@verify')->name('user.verification');
Route::get('/dashboard','FrontEnd\UsersController@dashboard')->name('user.dashboard');
Route::get('/profile','FrontEnd\UsersController@profile')->name('user.profile');

Route::post('/profile/update','FrontEnd\UsersController@profileUpdate')->name('user.profile.update');

      });

// End of USer Routes


// ALL Carts Route
Route::group(['prefix' =>'carts'],function(){
Route::get('/','FrontEnd\CartsController@index')->name('carts');


Route::post('/store','FrontEnd\CartsController@store')->name('carts.store');
Route::post('/update/{id}','FrontEnd\CartsController@update')->name('carts.update');
Route::post('/delete/{id}','FrontEnd\CartsController@destroy')->name('carts.delete');

      });
// End of Carts Routes

/*
 ALL CheckOutouts Routes
*/
Route::group(['prefix' =>'chekout'],function(){
Route::get('/','FrontEnd\CheckOutsController@index')->name('checkouts');


Route::post('/store','FrontEnd\CheckOutsController@store')->name('checkouts.store');


      });
/*
End of CheckOutouts Routes
*/


/*
Only Products Routes
 All Product related Routes
*/
Route::group(['prefix' =>'products'],function(){
Route::get('/','FrontEnd\ProductsController@index')->name('products');
Route::get('/{slug}','FrontEnd\ProductsController@show')->name('products.show');
Route::get('/new/search','FrontEnd\PagesController@search')->name('search');

Route::get('/categories','FrontEnd\CategoriesController@index')->name('categories.index');
Route::get('/category/{id}','FrontEnd\CategoriesController@show')->name('categories.show');

});
/*
 Admin  All Routes
 All Admin and Product  Routes
*/




Route::group(['prefix' =>'admin'],function(){

Route::get('/','BackEnd\PagesController@index')->name('admin.index');


//Satrt Admin product Routes


  Route::group(['prefix' =>'/products'],function(){

    Route::get('/','BackEnd\ProductsController@index')->name('admin.products');



    Route::get('/create','BackEnd\ProductsController@create')->name('admin.product.create');

    Route::post('/store','BackEnd\ProductsController@store')->name('admin.product.store');


    Route::get('/edit/{id}','BackEnd\ProductsController@edit')->name('admin.product.edit');

    Route::post('/update/{id}','BackEnd\ProductsController@update')->name('admin.product.update');

    Route::post('/delete/{id}','BackEnd\ProductsController@delete')->name('admin.product.delete');

    });
//End  Admin product Routes

    // Satrt of Admin Category Routes


    Route::group(['prefix' =>'/categories'],function(){

    Route::get('/','BackEnd\CategoriesController@index')->name('admin.categories');



    Route::get('/create','BackEnd\CategoriesController@create')->name('admin.category.create');

    Route::post('/store','BackEnd\CategoriesController@store')->name('admin.category.store');


    Route::get('/edit/{id}','BackEnd\CategoriesController@edit')->name('admin.category.edit');

    Route::post('/category/edit/{id}','BackEnd\CategoriesController@update')->name('admin.category.update');

    Route::post('/category/delete/{id}','BackEnd\CategoriesController@delete')->name('admin.category.delete');

    });

//End of  Admin category Routes


// Satrt of Admin Band Routes
Route::group(['prefix' =>'/brands'],function(){

Route::get('/','BackEnd\BrandsController@index')->name('admin.brands');



Route::get('/create','BackEnd\BrandsController@create')->name('admin.brand.create');

Route::post('/store','BackEnd\BrandsController@store')->name('admin.brand.store');


Route::get('/edit/{id}','BackEnd\BrandsController@edit')->name('admin.brand.edit');

Route::post('/brand/edit/{id}','BackEnd\BrandsController@update')->name('admin.brand.update');

Route::post('/brand/delete/{id}','BackEnd\BrandsController@delete')->name('admin.brand.delete');

});
//End of Brand  Admin Routes


// Start Admin Division  Routes

Route::group(['prefix' =>'/divisions'],function(){

Route::get('/','BackEnd\DivisionsController@index')->name('admin.divisions');



Route::get('/create','BackEnd\DivisionsController@create')->name('admin.division.create');

Route::post('/store','BackEnd\DivisionsController@store')->name('admin.division.store');


Route::get('/edit/{id}','BackEnd\DivisionsController@edit')->name('admin.division.edit');

Route::post('/division/edit/{id}','BackEnd\DivisionsController@update')->name('admin.division.update');

Route::post('/division/delete/{id}','BackEnd\DivisionsController@delete')->name('admin.division.delete');

});
// End Admin Division  Routes


// Start Admin District  Routes

Route::group(['prefix' =>'/districts'],function(){

Route::get('/','BackEnd\DistrictsController@index')->name('admin.districts');



Route::get('/create','BackEnd\DistrictsController@create')->name('admin.district.create');

Route::post('/store','BackEnd\DistrictsController@store')->name('admin.district.store');


Route::get('/edit/{id}','BackEnd\DistrictsController@edit')->name('admin.district.edit');

Route::post('/district/edit/{id}','BackEnd\DistrictsController@update')->name('admin.district.update');

Route::post('/district/delete/{id}','BackEnd\DistrictsController@delete')->name('admin.district.delete');

});
// End Admin District  Routes




});

// End of Full  Admin Routes


Route::get('/token/{token}','FrontEnd\VerificationController@verify')->name('user.verification');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
