<?php

namespace App\Providers;

use View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\Frontend\CartComposer;
use App\Http\ViewComposers\Frontend\MenuComposer;
use App\Http\ViewComposers\Backend\OrderCountComposer;
use App\Http\ViewComposers\Frontend\CartProductComposer;

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
        View::composer('frontend._layouts.includes.menu', CartProductComposer::class);
        View::composer('admin._layouts.includes.sidebar', OrderCountComposer::class);
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
