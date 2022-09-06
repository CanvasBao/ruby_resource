<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthApi;
use App\Http\Controllers\API\UserApi;
use App\Http\Controllers\API\ProductApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//　Auth
Route::controller(AuthApi::class)->group(function () {
    Route::post('/login', 'login');
    Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
        Route::post('/logout', 'logout');
        Route::get('/loginInfo', 'loginInfo');
    });
});

//
Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    //　ユーザー
    Route::controller(UserApi::class)->prefix('user')->group(function () {
        Route::get('/list', 'list');
        Route::post('/register', 'register');
        Route::post('/{id}/update', 'update');
        Route::get('/info', 'detail');
        Route::delete('/{id}', 'delete');
    });
    //　商品
    Route::controller(ProductApi::class)->prefix('product')->group(function () {
        Route::get('/list', 'list');
        Route::post('/register', 'register');
        Route::post('/{id}/update', 'update');
        Route::get('/{id}', 'detail');
        Route::delete('/{id}', 'delete');
    });
});
