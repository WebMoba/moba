<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Breadcrumbs\BreadcrumbService;
use Illuminate\Support\Facades\Validator;

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
        Paginator::useBootstrap();

        Validator::extend('digits_at_least', function ($attribute, $value, $parameters, $validator) {
            $minDigits = $parameters[0] ?? 0;
            return preg_match('/^\d{' . $minDigits . ',}$/', $value);
        });
    }


    
}
