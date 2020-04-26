<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComeventJoin extends Model
{
    protected $fillable = ['user_id','stu_id','stu_confirm','course_id','jobtype','question1','question2','event_id','check','interviewinfo','interview','result','com_id','sturev01_id','sturev02_id'];

    public function comevent(){
        return $this->belongsTo('App\Comevent','event_id','id');
    }
    public function student(){
        return $this->belongsTo('App\StudentInfo','stu_id','id');
    }
   
    

}
