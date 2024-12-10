<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // re-autenticates cart items every time a view is called
//        View::composer('*', function ($view) {
//            if (auth()->check()) {
//                $cartItemsCount = auth()->user()->cart->count();
//            } else {
//                $cartItemsCount = 0;
//            }
//
//            $view->with('cartItemsCount', $cartItemsCount);
//        });
    }
}
