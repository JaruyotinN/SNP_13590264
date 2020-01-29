<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComeventJoin extends Model
{
    protected $fillable = ['user_id','question1','question2','event_id','check','interview','result'];

    public function comevent(){
        return $this->belongsTo('App\Comevent','event_id','id');
    }
    public function studentJoin(){
        return $this->belongsTo('App\StudentInfo','user_id','id');
    }

}
