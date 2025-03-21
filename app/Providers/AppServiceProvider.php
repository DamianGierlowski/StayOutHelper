<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('enum', function ($attribute, $value, $parameters, $validator) {
            $enumClass = $parameters[0] ?? null;
            return $enumClass && in_array($value, array_column($enumClass::cases(), 'value'));
        });
    }
}
