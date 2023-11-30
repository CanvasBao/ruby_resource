<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthApi;
use App\Http\Controllers\API\UserApi;
use App\Http\Controllers\API\ProductApi;
use App\Http\Controllers\API\BannerApi;
use App\Http\Controllers\API\CategoryAPI;

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

// sail artisan route:list --path=api/ 

//　Auth
Route::controller(AuthApi::class)->group(function () {
    Route::post('/login', 'login');
    Route::get('/token_refresh', 'appRefresh');
    Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
        Route::post('/logout', 'logout');
        Route::get('/loginInfo', 'loginInfo');
    });
});

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    // category
    Route::controller(CategoryAPI::class)->prefix('category')->group(function () {
        Route::get('/', 'index');
        Route::post('/register', 'store');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    // banner
    Route::controller(BannerApi::class)->prefix('banner')->group(function () {
        Route::get('/', 'index');
        Route::post('/register', 'store');
        Route::post('/upload', 'multiUpload');
        Route::post('/update-index', 'updateBannerIndex');
        Route::delete('/{id}', 'destroy');
    });

    // product
    Route::controller(ProductApi::class)->prefix('product')->group(function () {
        Route::get('/', 'index');
        Route::post('/register', 'store');
        Route::post('/{id}/best-sell', 'registerBestSell');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});