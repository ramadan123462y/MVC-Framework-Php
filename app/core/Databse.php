<?php

namespace APP\core;



class Databse
{

    private const  servername = "localhost";
    private  const username = "root";
    private  const password = "";
    private  const dbname = "profile";
    private static $connection = null;



    private static function connection()
    {

        $connection = new \mysqli(env('servername'), env('username'), env('password'), env('dbname'));
        self::$connection = $connection;
        return $connection;
    }

    /**
     * 
     * 
     * 
     */

    public static function query($query)
    {


        if (self::$connection == null) {


            $connection =  self::connection();
        } else {

            $connection =  self::$connection;
        }
        $results = $connection->query($query);
        $rows = [];
        while ($result = $results->fetch_assoc()) {
            $rows[] = $result;
        };
        return $rows;
    }
    public static function query_row($query)
    {


        if (self::$connection == null) {


            $connection =  self::connection();
        } else {

            $connection =  self::$connection;
        }
        $results = $connection->query($query);
        $rows = [];
        $rows[] = $results->fetch_assoc();

        return $rows;
    }

    public static function sql($query)
    {


        if (self::$connection == null) {


            $connection =  self::connection();
        } else {

            $connection =  self::$connection;
        }

        $results =   mysqli_query($connection, $query);

        return $results;
    }


    public static function select($table, ...$argc)
    {


        $items = [];

        foreach ($argc as $arg) {


            if ($argc[count($argc) - 1] == $arg) {


                $items[] = '`' . $arg . '`';
            } else {
                $items[] = '`' . $arg . '`' . ',';
            }
        }

        $new =   implode('', $items);

        if (empty($arg)) {


            $query = "SELECT * FROM `$table` ";
        } else {


            $query = "SELECT $new FROM `$table` ";
        }
        $connection = self::connection();
        $results =   mysqli_query($connection, $query);
        $rows = [];
        while ($result = mysqli_fetch_assoc($results)) {
            $rows[] = $result;
        };

        return $rows;
    }
}
