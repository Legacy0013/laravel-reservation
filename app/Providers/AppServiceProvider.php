<?php

namespace App\Providers;

use App\Models\Hotel;

use App\Models\Categorie;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['hotel.index', 'hotel.create', 'hotel.edit'], 
        function ($view) {
            $view->with('categories', Categorie::all());
        });
        
        Route::bind('evenement', function ($value) {
            return Hotel::with('etiquettes')->find($value) ?? abort('404');
        });

        Paginator::defaultView('vendor/pagination/tailwind');
        Paginator::defaultSimpleView('vendor/pagination/tailwind');
        // Paginator::useBootstrap();
    }
}
