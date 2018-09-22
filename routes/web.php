<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function () {
	Route::get('/', function (){ return view('admin.layouts.master'); });
    Route::get('/categories', 'CategoryController@index')->name("categories.list");
    Route::get('/categories/create', 'CategoryController@create')->name("categories.create");
    Route::post('/categories/create', 'CategoryController@store')->name("categories.store");
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name("categories.edit");
    Route::put('/categories/edit/{id}', 'CategoryController@update')->name("categories.update");
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
