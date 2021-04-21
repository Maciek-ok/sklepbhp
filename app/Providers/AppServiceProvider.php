<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //wyświetlanie kategori we wszytskich widokach
        View::share('categories', DB::table('categories')->get());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //dodanie paginacji do szblonu boodstrap
         Paginator::useBootstrap();
    }
}
