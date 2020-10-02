<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    protected $table='rezervacija';
    protected $fillable=['datum','pocetak','kraj','user_id','ucionica_id'];

    public function ucionica(){
        return $this->belongsTo('App\Ucionica');
    } 
    public function user(){
        return $this->belongsTo('App\User');
    } 
}
 