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
        View::share('browser_key', 'AIzaSyDcEAVCwHf0OtZ4jKB3aVOE_auka3pLPQU');
        View::share('server_key', 'AIzaSyByaynCk7vcuS66I4S6Ed46IgreC54UVEg');

        View::share('browser_key_placeholder', 'BROWSER_KEY');
        View::share('server_key_placeholder', 'SERVER_KEY');
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
