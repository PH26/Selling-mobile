<?php

//Begin route of Pages
Route::get('/','PageController@index')->name('index');
Route::get('/category/{id}','PageController@category')->name('category');
Route::get('/product/{product}','PageController@product')->name('product');
Route::get('/compare/{product}/{product2}','PageController@compare')->name('compare');
Route::get('/search', 'PageController@search')->name("search"); 

Auth::routes();
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
Route::post('/login','UserController@login')->name("users.login");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/details/{id}', 'HomeController@details')->name('details');
Route::get('/home/edit', 'HomeController@edit')->name('edit');
Route::post('/home/edit', 'HomeController@update')->name('update');
Route::get('/home/change', 'HomeController@change')->name('change');
Route::post('/home/changed', 'HomeController@changed')->name('changed');


Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/view', 'CartController@view')->name('cart.view');
Route::get('/cart/remove','CartController@remove')->name("cart.remove");
Route::get('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/order', 'CartController@order')->name('cart.order');
Route::post('/cart/pay', 'CartController@pay')->name('cart.pay');
// End route of Pages

//************************************************************************//

//Begin route of Admin
Route::get('/admin/login','AdminController@getLogin')->name('admin.getLogin'); 
Route::post('/admin/login','AdminController@login')->name("admin.login");
Route::get('/admin/logout','AdminController@logout')->name('admin.logout'); 

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {

		Route::get('/', function (){ return view('admin.index'); })->name('admin.index');
		
		Route::group(['prefix'=>'categories'],function () {
		    Route::get('/', 'CategoryController@list')->name("categories.list");
		    Route::get('/search', 'CategoryController@search')->name("categories.search");
		    Route::get('/create', 'CategoryController@create')->name("categories.create");
		    Route::post('/create', 'CategoryController@store')->name("categories.store");
		    Route::get('/edit/{category}', 'CategoryController@edit')->name("categories.edit");
		    Route::put('/edit/{category}', 'CategoryController@update')->name("categories.update");
		    Route::get('/delete/{id}','CategoryController@destroy')->name("categories.destroy");
		});

		Route::group(['prefix'=>'users'],function () {
		    Route::get('/', 'UserController@list')->name("users.list");
		    Route::get('/search', 'UserController@search')->name("users.search");
		    Route::get('/create', 'UserController@create')->name("users.create");
		    Route::post('/create', 'UserController@store')->name("users.store");
		    Route::get('/edit/{user}', 'UserController@edit')->name("users.edit");
		    Route::put('/edit/{user}', 'UserController@update')->name("users.update");
		    Route::get('/delete/{id}','UserController@destroy')->name("users.destroy");
		});

		Route::group(['prefix'=>'products'],function () {
		    Route::get('/', 'ProductController@list')->name("products.list");
		    Route::get('/search', 'ProductController@search')->name("products.search");
		    Route::get('/create', 'ProductController@create')->name("products.create");
		    Route::post('/create', 'ProductController@store')->name("products.store");
		    Route::get('/edit/{product}', 'ProductController@edit')->name("products.edit");
		    Route::put('/edit/{product}', 'ProductController@update')->name("products.update");
		    Route::get('/delete/{id}','ProductController@destroy')->name("products.destroy");
		});

		Route::group(['prefix'=>'orders'],function () {
		    Route::get('/', 'OrderController@list')->name("orders.list");
		    Route::get('/search', 'OrderController@search')->name("orders.search");
		    Route::get('/details/{id}', 'OrderController@details')->name("orders.details");
		    Route::get('/update/{id}', 'OrderController@update')->name("orders.update");
		});

});
// End route of Admin

