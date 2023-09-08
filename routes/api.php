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
    Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
        Route::post('/logout', 'logout');
        Route::get('/loginInfo', 'loginInfo');
    });
});

// Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    // //
    // Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    //     //　ユーザー
    //     Route::controller(UserApi::class)->prefix('user')->group(function () {
    //     });
    //     Route::apiResource('user', UserApi::class);
    //     //　商品
    //     Route::controller(ProductApi::class)->prefix('product')->group(function () {
    //     });
    //     Route::apiResource('product', ProductApi::class);
    // });

    // category
    Route::controller(CategoryAPI::class)->prefix('category')->group(function () {
        Route::get('/', 'index');
        Route::post('/register', 'store');
    });

    // banner
    Route::controller(BannerApi::class)->prefix('banner')->group(function () {
        Route::get('/', 'index');
        Route::post('/register', 'store');
    });

    // product
    Route::controller(ProductApi::class)->prefix('product')->group(function () {
        Route::get('/', 'index');
        Route::post('/register', 'store');
    });
// });