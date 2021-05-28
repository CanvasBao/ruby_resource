<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Guest')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('contact', 'ContactController')->only(["index", "store"]);

    Route::resource('about-us', 'AboutUsController')->only(["index"]);

    Route::resource('product', 'ProductController')->only(["index", "show"]);
});

Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::get('/', 'LoginController@index')->name('login');

    Route::post('/', 'LoginController@authenticate')->name('login.auth');

    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::middleware('auth')->group(function(){
        Route::resource('dashboard', 'DashboardController')->only(["index"]);
        
        Route::resource('about', 'AboutController')->only(["index", "update"]);

        Route::resource('banner', 'BannerController')->only(["index", "store", "update", "destroy"]);

        Route::resource('product', 'ProductController',['as' => 'manage'])->except(["show"]);
    });
});