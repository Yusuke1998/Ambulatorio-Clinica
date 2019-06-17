<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Cita
class appointment extends Model
{
    protected $fillable = [
        'patient_id','user_id','doctor_id','status','date'
    ];

    public function calendar(){
    	return $this->hasOne('App\calendar');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function patient(){
    	return $this->belongsTo('App\patient');
    }

    public function doctor(){
    	return $this->belongsTo('App\doctor');
    }
}
