<?php

namespace APP\core;

use Exception;

class Handler
{


    public $method;
    public $path;

    public function __construct()
    {
        $this->method();
        $this->path();
        $this->resolve();
    }



    public function method()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->method = $method;
    }

    public function path()
    {
        $path = $_SERVER['REQUEST_URI'];
        $array = str_contains($path, '?') ? explode('?', $path)[0] : $path;
        $this->path = $array;
    }

    public function resolve()
    {
        if (isset(Route::$routers[$this->method][$this->path])) {

            $route = Route::$routers[$this->method][$this->path];

        return   call_user_func_array([new $route[0], $route[1]], []);
        } else {

            throw new Exception("Route not found.");
        }
    }
}
