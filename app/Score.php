<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function joptype(){
        return $this->belongsTo('App\Joptype','type_id','id');
    }
    public function student(){
        return $this->belongsTo('App\StudentInfo','stu_id','id');
    }
    
}
