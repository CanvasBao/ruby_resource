<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // メールアドレス
        Validator::extend('email_ex', function ($attribute, $value, $parameters, $validator) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        });
        // フリガナチェック
        Validator::extend('kana_ex', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[ァ-ンー 　]+$/u', $value);
        });
        //商品コード
        Validator::extend('code_ex', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z0-9\-]+$/u', $value);
        });
    }
}
