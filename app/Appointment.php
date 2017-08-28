<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

	protected $table = 'appointment';

     protected $fillable = [
        'doctor_speciality', 'notes', 'appointment_time',
    ];
}
