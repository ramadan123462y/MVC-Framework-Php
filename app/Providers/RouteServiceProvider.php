<?php


namespace APP\Providers;

use APP\controllers\homecontroller;
use APP\core\Handler;
use APP\core\Route;
use APP\ServiceContainer;

class RouteServiceProvider extends ServiceContainer
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->bind('hand', new Handler);
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
