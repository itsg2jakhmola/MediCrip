<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class Usertype extends Model
{


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'user_type';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name'  
    ];


    
}
