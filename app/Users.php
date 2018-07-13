<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'user_login';
    protected $fillable = ['user_login'];

    public function articles()
    {
        return $this->hasMany(Articles::class);
    }
}
