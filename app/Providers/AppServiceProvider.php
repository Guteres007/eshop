<?php

namespace App\Providers;

use View;
use App\Http\ViewComposers\Frontend\CartComposer;
use App\Http\ViewComposers\Frontend\MenuComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('frontend._layouts.includes.menu', MenuComposer::class);
        View::composer('frontend._layouts.includes.menu', CartComposer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
