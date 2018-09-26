<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login','UserController@getLoginAdmin')->name('admin.getLogin'); 
Route::post('/admin/login','UserController@loginAdmin')->name("admin.login");
Route::get('/admin/logout','UserController@logoutAdmin')->name('admin.logout'); 

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {
		Route::get('/', function (){ return view('admin.layouts.master'); })->name('admin.index');
		
		Route::group(['prefix'=>'categories'],function () {
		    Route::get('/', 'CategoryController@list')->name("categories.list");
		    Route::get('/create', 'CategoryController@create')->name("categories.create");
		    Route::post('/create', 'CategoryController@store')->name("categories.store");
		    Route::get('/edit/{category}', 'CategoryController@edit')->name("categories.edit");
		    Route::put('/edit/{category}', 'CategoryController@update')->name("categories.update");
		    Route::get('/delete/{category}','CategoryController@destroy')->name("categories.destroy");
		});

		Route::group(['prefix'=>'users'],function () {
		    Route::get('/', 'UserController@list')->name("users.list");
		    Route::get('/create', 'UserController@create')->name("users.create");
		    Route::post('/create', 'UserController@store')->name("users.store");
		    Route::get('/edit/{user}', 'UserController@edit')->name("users.edit");
		    Route::put('/edit/{user}', 'UserController@update')->name("users.update");
		    Route::get('/delete/{user}','UserController@destroy')->name("users.destroy");
		});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
