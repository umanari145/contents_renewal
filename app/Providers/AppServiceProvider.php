<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'pc.common.sidebar', \App\Http\ViewComposers\TagComposer::class
        );
        \DB::listen(
            function($query) {
                \Log::debug("SQL LOG::", [$query->sql, $query->bindings, $query->time]);
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
