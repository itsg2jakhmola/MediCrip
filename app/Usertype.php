<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usertype extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'user_type';
}
