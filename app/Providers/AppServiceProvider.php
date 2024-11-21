<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('website', function ($attribute, $value, $parameters, $validator) {
            return filter_var($value, FILTER_VALIDATE_URL);
        });

        Validator::replacer('website', function ($message, $attribute, $rule, $parameters) {
            return "O campo {$attribute} deve conter uma URL válida.";
        });
    }
}
