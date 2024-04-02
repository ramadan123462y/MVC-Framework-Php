<?php


namespace APP\core;

use APP\Custome\Requestclass;

class File
{


    /**
     * 
     * @parem1 Name of file in Input
     * @parem2 N(Path new File )+ ($request->file('file')->name)
     * 
     */

    public static function upload_file($file_name, $to)
    {

        $request = new Requestclass();
        $file = $request->file($file_name);
        $from = $file->full_path;
        move_uploaded_file($from, $to);
    }

    public static function delete_file($path)
    {

        $results = unlink($path);
        return $results;
    }
}
