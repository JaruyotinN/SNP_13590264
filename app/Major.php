<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function faculty(){
        return $this->belongsTo('App\Faculty','faculty_id','id');
    }

    public function ab($a,$b){
        return $a+$b;
    }
}
