<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        Schema::defaultStringLength(191);
    //     $wishlist_cart = app()->make(WishlistCart::class);
    //      if (Auth::check())
    //      { 	$wishlist_cart->session(Auth::user()->id); }
    //       else
    //       { $wishlist_cart->setSession(app('session'));
    //      }
     }
}
