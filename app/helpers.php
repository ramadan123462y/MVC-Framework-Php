<?php

use APP\Providers\EventServiceProvider;
use APP\ServiceContainer;

function view($path, array $params = null)
{

    if (isset($params)) {

        extract($params);
    }
    require_once(VIEW . "/resources/$path.php");
}

function env($var)
{


    $env = parse_ini_file('../.env');
    $results_env = $env[$var];
    return $results_env;
}

function DB()
{

    $options = [
        'username' => env('username'),
        'database' => env('database'),
        'password' => env('password'),
        'type' => env('type'),
        'charset' => env('charset'),
        'host' => env('host'),
        'port' => env('port')
    ];

    $db = new Dcblogdev\PdoWrapper\Database($options);
    return $db;
}


function app()
{
    $container = new ServiceContainer;
    return $container;
}


function redirect($path)
{
    $Domain = env('Domain');

    header("Location: $Domain$path", true, 301);
}

function config()
{

    require "../config/app.php";
    return $providers;
}

function storage_path($folder)
{

    $path = Storage . DS . $folder;
    return $path;
}
function public_path($folder)
{

    $path = PUBLIC_path . DS . $folder;
    return $path;
}

function event($event)
{


    foreach (EventServiceProvider::$listen[$event::class] as $listners) {
        $objext = new $listners;

       $objext->handle($event);
    }
}
