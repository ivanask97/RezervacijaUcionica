<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ucionica extends Model
{
    protected $table='ucionica';
    protected $fillable=['broj','vrsta','zgrada_id'];

    public function zgrada(){
        return $this->belongsTo('App\Zgrada');
    } 
    
    public function rezervacije(){
        return $this->hasMany('App\Rezervacija');
    }

}
 