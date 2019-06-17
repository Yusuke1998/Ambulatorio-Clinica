<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Configuracion
class config extends Model
{
    protected $fillable = [
    	'name','rif','telephone','address','logo','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
