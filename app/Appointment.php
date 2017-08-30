<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

	protected $table = 'appointment';

     protected $fillable = [
        'doctor_speciality', 'notes', 'appointment_time',
    ];

    public function appointment_request()
    {
    	return $this->hasOne(AppointmentRequest::class, 'appointment_id');
    }

    public function prescriptions(){
    	return $this->hasOne(DoctorPrescription::class, 'appointment_id');
    }
}
