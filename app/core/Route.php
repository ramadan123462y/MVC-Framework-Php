<?php


namespace APP\core;

/**
 * @method static APP\core\Router get(array route,string action)
*/

class Route
{

    public static $routers = [];

    public static function get($route, $action)
    {
        self::$routers['get'][$route] = $action;
    }



    public static function post($route, $action)
    {
        self::$routers['post'][$route] = $action;
    }



}
