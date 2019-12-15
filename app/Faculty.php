<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function university(){
        return $this->belongsTo('App\University','uni_id','id');
    }
    public function majors(){
        return $this->hasMany('App\Major','faculty_id','id');
    }
}
