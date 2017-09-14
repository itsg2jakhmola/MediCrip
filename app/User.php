<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password', 'user_type', 'dob', 'medical_number', 'address', 'phone_number', 'doctor_practice', 'fax_number', 'lat', 'lng', 'about', 'insurance_number', 'insurance_company', 'remember_token',  
    ];

    public function appointmentRequest(){
      return $this->hasMany(AppointmentRequest::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
