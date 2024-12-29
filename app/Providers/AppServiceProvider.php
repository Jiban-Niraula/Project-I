<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Pagination\Paginator;
=======
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5

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
<<<<<<< HEAD
        Paginator::useBootstrap();
=======
        //
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
    }
}
