<?php

namespace APP\Facades;


class Facade
{

    protected static function set_accessories()
    {
        // name class 
        return Facade::class;
    }
    


    public static function __callStatic($name, $arguments)
    {

        $class =  static::set_accessories();
        $object = new $class;
        $function = $object->$name(...$arguments);
        return $function;
    }
}
