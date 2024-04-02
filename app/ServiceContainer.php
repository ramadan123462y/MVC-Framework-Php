<?php


namespace APP;

use APP\core\Handler;
use APP\Providers\RouteServiceProvider;
use Exception;

class ServiceContainer
{

    public static $services = [];

    private static $instance;
    public $var;
    public function bind($key, $value)
    {

        self::$services[$key] = $value;
    }

    public function make($key)
    {
        return self::$services[$key];
    }

    public function run()
    {


        $providers = config();




        foreach ($providers as $provider) {
            $object = new $provider;

            $object->register();
        }
        foreach ($providers as $provider) {
            $object = new $provider;

            $object->boot();
        }
    }
}
