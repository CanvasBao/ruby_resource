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
            return preg_match('/^([0-9]{2,3}-[0-9]{3,4}-[0-9]{3,4}|[0-9]{8,11})+$/u', $value);
        });
        
    }

    /**
     * add class component
     */
    private function registerClassComponent()
    {
    }
}
