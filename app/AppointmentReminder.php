<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentReminder extends Model
{
     protected $table = 'appointment_reminder';

     protected $fillable = [
        'appointment_id', 'reminder_to', 'reminder_from', 'set_reminder', 'remarks', 'created_at', 'updated_at'
    ];


}
