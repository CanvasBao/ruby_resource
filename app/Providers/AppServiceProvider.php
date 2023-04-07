<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;

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
        $this->addValidatorConfig();
        $this->registerClassComponent();
    }

    /**
     * validator
     */
    private function addValidatorConfig()
    {
        // e-mail
        Validator::extend('email_ex', function ($attribute, $value, $parameters, $validator) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        });
        //product code
        Validator::extend('code_ex', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z0-9\-]+$/u', $value);
        });
        //TEL
        Validator::extend('phone_ex', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]{10}+$/u', $value);
        });
    }

    /**
     * add class component
     */
    private function registerClassComponent()
    {
        Blade::component('layout.header.link', \App\View\Components\layout\header\link::class);
         //shared
        Blade::component('shared.meta', \App\View\Components\shared\meta::class);
        Blade::component('shared.pagination', \App\View\Components\shared\pagination::class);
        //top
        Blade::component('top.material', \App\View\Components\top\material::class);
        Blade::component('top.product', \App\View\Components\top\product::class);
        Blade::component('top.slider', \App\View\Components\top\slider::class);

        Blade::component('product.tabs', \App\View\Components\product\tabs::class);

    }
}
