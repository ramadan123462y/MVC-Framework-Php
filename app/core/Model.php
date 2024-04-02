<?php


namespace APP\core;

use APP\models\User;

class Model
{



    private $coloums;

    protected $table;
    private $where = null;
    private $id = null;
    private $select = null;
    protected $fillable = [];

    public static function all()
    {
        $object = new static;
        $table = $object->table;

        $results = Databse::query("SELECT * FROM `$table` WHERE 1");

        return $results;
    }

    public static function find($id)
    {
        $object = new static;
        $table = $object->table;
        $object->id = $id;
        return $object;
    }

    public static function where($coulomn, $opertion, $value)
    {
        $object = new static;
        $table = $object->table;

        if ($object->where != null) {

            $object->where = " AND $object->table.`$coulomn`$opertion'{$value}'";
        } else {


            $object->where = "$object->table.`$coulomn`$opertion'{$value}'";
        }


        return $object;
    }
    public function first()
    {

        if ($this->select != null) {
            $select = $this->select;
        } else {

            $select = '*';
        }

        if ($this->where != null) {

            $query = Databse::query_row("SELECT $select FROM `$this->table` WHERE $this->where ");
        } elseif ($this->id != null) {

            $query = Databse::query_row("SELECT $select FROM `$this->table` WHERE `id`='$this->id'");
        } else {

            $query = "Error Excepted Define Find Or Where";
        }


        return $query;
    }
    public function get()
    {

        if ($this->select != null) {
            $select = $this->select;
        } else {

            $select = '*';
        }

        if ($this->where != null) {

            $query = Databse::query("SELECT $select FROM `$this->table` WHERE $this->where ");
        } elseif ($this->id != null) {

            $query = Databse::query("SELECT $select FROM `$this->table` WHERE `id`='$this->id'");
        } else {

            $query = "Error Excepted Define Find Or Where";
        }


        return $query;
    }

    public function select(...$argc)
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


            $query = "SELECT * FROM `$this->table` ";
        } else {


            $query = "SELECT $new FROM `$this->table` ";
        }

        $this->select = $new;
        return $this;
    }

    public static function store(array $data)
    {

        $object = new static;


        $table = $object->table;

        $keys = [];
        $values = [];

        foreach (array_values($data) as $key => $value) {
            if ((count($data) - 1) == $key) {
                $values[] = "'$value'";
            } else {

                $values[] = "'$value',";
            }
        }

        $output =   implode('', $values);



        foreach (array_keys($data) as $key => $value) {
            if ((count($data) - 1) == $key) {
                $keys[] = "`$value`";
            } else {

                $keys[] = "`$value`,";
            }
        }

        $input =   implode('', $keys);




        $results = Databse::sql("INSERT INTO `$table`($input) VALUES ($output)");
        return $results;
    }

    public function update(array $data)
    {
        $table = $this->table;
        $array = [];
        $count = count($data);


        foreach ($data as $key => $value) {

            if ((count($array) + 1) == $count) {

                $array[] = "`$key`='$value'";
            } else {

                $array[] = "`$key`='$value',";
            }
        }
        $str = implode('', $array);

        if ($this->where != null) {

            $results = Databse::sql("UPDATE `$table` SET $str WHERE $this->where ");
        } else if ($this->id != null) {

            $results = Databse::sql("UPDATE `$table` SET $str WHERE `id`='{$this->id}'");
        }

        return $results;
    }

    public function delete()
    {


        $table = $this->table;


        if ($this->where != null) {

            $results = Databse::sql("DELETE FROM `$table` WHERE $this->where ");
        } else if ($this->id != null) {

            $results = Databse::sql("DELETE FROM `$table` WHERE `id`='{$this->id}'");
        }

        return $results;
    }
    // has many



    public function hasMany($model, $foreign_key)
    {

        $model = new $model();
        $table = $model->table;
        $fillable = $model->fillable;

        foreach ($fillable as $fill) {

            $array_coulomn[] = "$table.$fill";
        }

        $couloms = implode(',', $array_coulomn);
        if ($this->where) {

            $results = Databse::query("SELECT $table.* FROM `$this->table` inner JOIN `$table` ON $table.$foreign_key=$this->table.id WHERE $this->where ");
        } elseif ($this->id) {

            $results = Databse::query("SELECT $table.* FROM `$this->table` inner JOIN `$table` ON $table.$foreign_key=$this->table.id WHERE  $this->table.`id`='$this->id' ");
        }


        return $results;
    }

    // belongs to 
    public function belongsTo($model, $foreign_key)
    {

        $model = new $model();
        $table = $model->table;
        $fillable = $model->fillable;

        foreach ($fillable as $fill) {

            $array_coulomn[] = "$table.$fill";
        }

        $couloms = implode(',', $array_coulomn);
        if ($this->where) {

            $results = Databse::query("SELECT $table.* FROM `$this->table` inner JOIN `$table` ON $table.id=$this->table.$foreign_key WHERE $this->where ");
        } elseif ($this->id) {

            $results = Databse::query("SELECT $table.* FROM `$this->table` inner JOIN `$table` ON $table.id=$this->table.$foreign_key WHERE  $this->table.`id`='$this->id' ");
        }


        return $results;
    }


    public function hasOne($model, $foreign_key)
    {

        $model = new $model();
        $table = $model->table;
    
        if ($this->where) {

            $results = Databse::query_row("SELECT $table.* FROM `$this->table` inner JOIN `$table` ON $table.$foreign_key=$this->table.id WHERE $this->where ");
        } elseif ($this->id) {

            $results = Databse::query_row("SELECT $table.* FROM `$this->table` inner JOIN `$table` ON $table.$foreign_key=$this->table.id WHERE  $this->table.`id`='$this->id' ");
        }


        return $results;
    }




    public function __get($name)
    {


        return $this->$name();
    }
}
