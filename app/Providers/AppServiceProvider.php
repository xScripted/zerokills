<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('banners', Banners::class);
        Blade::component('calendario', Calendario::class);
        Blade::component('jugadores', Jugadores::class);
        Blade::component('media', Media::class);
        Blade::component('noticias', Noticias::class);
    }
}
