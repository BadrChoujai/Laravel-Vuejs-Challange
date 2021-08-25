<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\UserController;


// API MIDDLEWARE
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::get('open', 'App\Http\Controllers\DataController@open');

// ['middleware' => ['jwt.verify']],
Route::group(['middleware' => 'jwt.auth'], function() {

    // PRODUCTS API ROUTES 
    Route::post('logout', 'App\Http\Controllers\UserController@logout');
    Route::post('products', 'App\Http\Controllers\Api\ProductController@store');
    Route::get('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('closed', 'App\Http\Controllers\DataController@closed');
    Route::get('products', 'App\Http\Controllers\Api\ProductController@index');
    Route::get('products/{id}', 'App\Http\Controllers\Api\ProductController@show');
    Route::get('proCategory/{id}', 'App\Http\Controllers\Api\ProductController@proCategory');
    // Route::post('products', 'App\Http\Controllers\Api\ProductController@create');
    Route::put('products/{id}', 'App\Http\Controllers\Api\ProductController@update');
    Route::delete('products/{id}', 'App\Http\Controllers\Api\ProductController@destroy');
    
    // CATEGORY API ROUTES

    Route::get('categories', 'App\Http\Controllers\Api\CategoryController@index');

    Route::get('categories/{id}', 'App\Http\Controllers\Api\CategoryController@show');

    Route::post('categories', 'App\Http\Controllers\Api\CategoryController@create');

    Route::put('categories/{id}', 'App\Http\Controllers\Api\CategoryController@update');

    Route::delete('categories/{id}', 'App\Http\Controllers\Api\CategoryController@destroy');


});



