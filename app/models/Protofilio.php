<?php


namespace APP\models;

use APP\core\Model;

class Protofilio extends Model
{

    protected  $table = 'protofilio';
    protected $fillable = [
        'id', 'image', 'descreption', 'user_id'
    ];


    public function user()
    {

        return $this->belongsTo(User::class, 'user_id');
    }
}
