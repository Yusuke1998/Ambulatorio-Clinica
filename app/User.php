<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// Usuario
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email','rol','password'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function receptionist(){
    	return hasOne('App\receptionist');
    }

    public function doctor(){
    	return hasOne('App\doctor');
    }

}
