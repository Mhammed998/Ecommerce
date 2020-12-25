<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',16);

Route::group(['prefix'=>'admin','middleware' =>'auth','namespace'=>'admin'] , function (){

    //main dashboard
    Route::get('/','AdminController@index')->name('admin.home');

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //users routes
    Route::get('/users','UsersController@index')->name('admin.users');
    Route::get('users/delete/{id}','UsersController@delete')->name('admin.delete');

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //categories routes
    Route::get('/categories','CategoriesController@index')->name('admin.categories');
    Route::get('/categories/create','CategoriesController@create')->name('admin.create.category');
    Route::post('/categories/store','CategoriesController@store')->name('admin.store.category');
    Route::get('/categories/delete/{id}','CategoriesController@delete')->name('admin.delete.category');
    Route::get('/categories/edit/{id}','CategoriesController@edit')->name('admin.edit.category');
    Route::post('/categories/update/{id}','CategoriesController@update')->name('admin.update.category');


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //products routes
    Route::get('/products','ProductsController@index')->name('admin.products');
    Route::get('/products/create','ProductsController@create')->name('admin.create.product');
    Route::post('/products/store','ProductsController@store')->name('admin.store.product');
    Route::get('/products/delete/{id}','ProductsController@delete')->name('admin.delete.product');
    Route::get('/products/edit/{id}','ProductsController@edit')->name('admin.edit.product');
    Route::post('/products/update/{id}','ProductsController@update')->name('admin.update.product');



    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Reviews routes

    Route::get('/reviews','ReviewsController@index')->name('admin.reviews');
    Route::get('/reviews/delete/{id}','ReviewsController@delete')->name('admin.reviews.delete');


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Orders routes

    Route::get('/orders','OrdersController@index')->name('admin.orders');











});





Auth::routes();


