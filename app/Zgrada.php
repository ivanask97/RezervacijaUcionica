<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zgrada extends Model
{
    protected $table='zgrada';
    protected $fillable=['mjesto','adresa'];

    public function ucionice(){
        return $this->hasMany('App\Ucionica');
    }
} 
 