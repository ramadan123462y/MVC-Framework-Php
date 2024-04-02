<?php


namespace APP\Facades;

use Rakit\Validation\Validator;


/**
 * @method static \Rakit\Validation\Validator make(array $inputs, array $rules, array $messages = [])
*/
class Validaion extends Facade
{


    protected static function set_accessories()
    {
        // name class 
        return Validator::class;
    }
    

}
