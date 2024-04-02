<?php


namespace APP\Facades;

use MiladRahimi\PhpCrypt\Symmetric;

class Encryption extends Facade
{

    public function set2()
    {

        return  app()->make(static::set_accessories());
    }



    protected static function set_accessories()
    {
        // name class 

        // return 'symmetric';
        return Symmetric::class;
    }
}
