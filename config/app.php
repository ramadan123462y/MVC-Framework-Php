<?php


/*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

use APP\core\Route;
use APP\Providers\RouteServiceProvider;
use APP\Providers\TestServiceprovidercopy;

$providers = [




    // start



    \APP\Providers\TestServiceprovidercopy::class,

    // end 

    \APP\Providers\RouteServiceProvider::class,

];
