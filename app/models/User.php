<?php


namespace APP\models;

use APP\core\Model;

class User extends Model
{

    protected  $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password'
    ];
    // ---------------------relations---------all()->


    public function protofilios()
    {


        return $this->hasMany(Protofilio::class, 'user_id');
    }
}
