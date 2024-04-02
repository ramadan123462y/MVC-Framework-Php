<?php

namespace APP\Custome;


class Requestclass
{


    public $request;


    public function __construct()
    {


        $this->request = (object) $_REQUEST;
    }

    public function all()
    {
        $this->request = $_REQUEST;
        return  (object) $_REQUEST;
    }

    public function file($name)
    {

        $object = $_FILES[$name];
        $object = (object)$_FILES[$name];
        $object->origine_name = $object->name;
        $object->full_path = $object->tmp_name;

        return $object;
    }
}
