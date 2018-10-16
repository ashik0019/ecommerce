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

// frontend normal pages route
Route::group(['prefix'=>'/','namespace'=>'Frontend'], function (){
    Route::get('', 'PagesController@index')->name('index');
    Route::get('contact', 'PagesController@contact')->name('contact');
    Route::get('search', 'PagesController@search')->name('search');
});

// frontend products route
Route::group(['as'=>'product.','prefix'=>'products','namespace'=>'Frontend'], function (){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/products/details/{slug}', 'ProductController@details')->name('details');
});


// admin All routes
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('product','ProductController');
    Route::resource('category','CategoryController');
});



