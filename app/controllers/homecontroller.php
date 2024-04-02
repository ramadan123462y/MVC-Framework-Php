<?php


namespace APP\controllers;

use APP\core\controller;
use APP\core\File;
use APP\Custome\Requestclass;
use APP\Events\OrderPlaced;
use APP\Providers\EventServiceProvider;
use APP\ServiceContainer;

class homecontroller extends controller
{

    public function index()
    {



  
        // event(new OrderPlaced('order1'));
   


    }

    public function store()
    {
        $request = new Requestclass;
        $file = File::upload_file('image', public_path("Uploades" . DS . $request->file('image')->name));
        redirect('/home/index');
    }
}
