<?php

namespace APP\Custome;

use APP\core\Databse;

class Auth
{

    /**
     * 
     * #IN FORM
     * @parems Name =name
     * @parems Email=email
     * @parems Password=password
     */

    public static function register()
    {

        $object_request = new Requestclass();
        $user = Databse::sql("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('{$object_request->request->name}','{$object_request->request->email}','{$object_request->request->password}')");


        if (isset($user) && !empty($user)) {
            return true;
        } else {

            return false;
        }
    }



    public  static  function attempt()
    {

        $object_request = new Requestclass();
        $user = Databse::query("SELECT * FROM `users` WHERE `email`='{$object_request->request->email}' && `password`='{$object_request->request->password}'");
        if (isset($user) && !empty($user)) {
            return true;
        } else {

            return false;
        }
    }
    public  static  function login()
    {

        try {

            $object_request = new Requestclass();

            session_start();

            $_SESSION['user_login'] = [

                'email' => $object_request->request->email,
                'password' => $object_request->request->password

            ];
            return true;
        } catch (\Exception $e) {


            return false;
        }
    }

    public  static  function user()
    {
        session_start();
        if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {


            return $_SESSION['user_login']['email'];
        } else {


            return false;
        }
    }

    public  static  function logout()
    {

        session_start();
        if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {


            $_SESSION['user_login'] = null;
            return true;
        } else {


            return false;
        }
    }

    public static function check()
    {

        session_start();
        if (!isset($_SESSION['user_login']['email']) || empty($_SESSION['user_login']['email'])) {

            return false;
        } else {


            return true;
        }
    }
}
