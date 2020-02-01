<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    public function student(){
        return $this->belongsTo('App\StudentInfo','stu_id','id');
    }
    public function company(){
        return $this->belongsTo('App\Companyinfos','com_id','id');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacherinfos','teacher_id','id');
    }
    
}
