<?php

use Illuminate\Support\Facades\Route;



Route::group(['namespace'=>'site'],function (){




    Route::get('/', 'SiteController@index')->name('site.home');
    Route::get('/main','SiteController@main')->name('site.main');
    Route::get('Home/cart','SiteController@ShowCart')->name('site.show-cart');
    Route::get('Home/addToCart/{id}','SiteController@addToCart')->name('site.addToCart');
    Route::patch('Home/update-cart', 'SiteController@updateCart');
    Route::delete('Home/remove-from-cart', 'SiteController@removeCart');


    Route::post('Home/filter-by-category','SiteController@filterByCategory');


    Route::get('Home/product/{id}', 'SiteController@show')->name('site.product.show');
    Route::get('Home/category/show/{id}','SiteController@categoryShow')->name('users.category.show');

    //reviews routes [Add review by user]
    Route::post('Home/review/save','SiteController@saveReview')->name('users.review.save');
    Route::delete('Home/review/delete/{id}','SiteController@deleteReview')->name('users.review.delete');




});











Auth::routes();


