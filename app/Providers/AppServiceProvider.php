<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\IoC\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Builder::registerRepo($this->app);
        Builder::registerService($this->app);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
