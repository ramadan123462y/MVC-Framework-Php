<?php


namespace APP\Providers;

use APP\controllers\homecontroller;
use APP\core\Handler;
use APP\core\Route;
use APP\ServiceContainer;
use stdClass;

class TestServiceprovidercopy extends ServiceContainer
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
  

        $this->bind('test', 'value');
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
