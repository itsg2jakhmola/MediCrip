<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorPrescription extends Model
{
    protected $table = 'prescriptions';

     protected $fillable = [
        'to_patient', 'from_doctor', 'created_at', 'updated_at'
    ];

    public function users($local_key = 'user_id'){
    	return $this->belongsTo('App\User', $local_key, 'id');
    }
}
