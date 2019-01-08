<?php

namespace App\Providers;

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
        // Share $view_name variable with all views
        view()->composer('*', function($view){
            $view_name = $view->getName();
            $vn_exploded = explode('.', $view_name);

            $view_name = str_replace('.', '-', $view_name);
            $view_name = str_slug($view_name, '-');
            $view_name = 'page-' . str_slug($vn_exploded[0], '-') . ' ' . $view_name;

            view()->share('view_name', $view_name);
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
