<?php

namespace APP\core;


class app
{

    private $controller;
    private $method;
    private $params;


    public function __construct()
    {
        $this->url();
        $this->render();
    }


    public  function url()
    {
        $query_string = $_SERVER['REQUEST_URI'];
        $url_array = explode('/', $query_string);
        unset($url_array[0]);
        $this->controller = isset($url_array[1]) ? $url_array[1] . "controller" : "homecontroller";
        $this->method = isset($url_array[2]) ? $url_array[2] : 'index';
        unset($url_array[1], $url_array[2]);
        $params = array_values($url_array);
        $this->params = $params;
    }

    public function render()
    {
        $controller = "APP\controllers\\" . $this->controller;
        if (class_exists($controller)) {


            if (method_exists($controller, $this->method)) {
                $object_controller = new $controller;
                call_user_func_array([$object_controller, $this->method], $this->params);
            } else {

                echo "Method $this->method Not Found IN Controller";
            }
        } else {

            echo "Class Not Exist";
        }
    }


}
