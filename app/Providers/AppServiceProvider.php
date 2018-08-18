<?php

namespace App\Providers;

use App\Product;
use App\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.leftsidebar', function ($view){
            $products = Product::all();
            $storages = Storage::all();

            $view->with(compact(['products','storages']));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
