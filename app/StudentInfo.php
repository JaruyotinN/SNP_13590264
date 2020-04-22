<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = ['profile_id','name','surname','number','phonenumber','course_id','img','address','port','cv','url_port','sentinvite','intern_id','major_id','teacher_id'];

    public function comevent_joins(){
        return $this->hasOne('App\ComeventJoin','stu_id','id');
    }
    public function major(){
        return $this->belongsTo('App\Major','major_id','id');
    }
    public function scores(){
        return $this->hasMany('App\Score','stu_id','id');
    }
    public function course(){
        return $this->belongsTo('App\StudentCoutse','course_id','id');
    }

}
