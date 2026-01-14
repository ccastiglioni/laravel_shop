<?php

namespace App\Providers;

use App\Models\Categoria;
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
        ///var/www/html/lara_shop/resources/views/layouts/includes/language_switcher.blade.php
        view()->composer('layouts.language_switcher', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });

        view()->composer('layouts.header', function ($view) {
            try {
                $view->with('categorias', Categoria::all());
            } catch (\Throwable $e) {
                $view->with('categorias', collect());
            }
        });
   }
}
