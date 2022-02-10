<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
    'start',
    'end',
    'titlte',
    ];    
    public function users(){
    
        return $this->belongsToMany('App\User');
    }

}
