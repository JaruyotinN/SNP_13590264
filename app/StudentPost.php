<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPost extends Model
{
    protected $fillable = ['stu_id','title','description',];
    
    public function student(){
        return $this->belongsTo('App\StudentInfo','stu_id','id');
    }
}
