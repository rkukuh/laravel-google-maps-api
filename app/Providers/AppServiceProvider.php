<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::share('browser_key', 'AIzaSyCHnXGlwf8bxR_lc_eAvvkzf7MQYTk6ccE');
        View::share('server_key', 'AIzaSyByaynCk7vcuS66I4S6Ed46IgreC54UVEg');
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
