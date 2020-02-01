<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPost extends Model
{
    protected $fillable = ['stu_id','title','description',];
    public function post(){
        return $this->belongsTo('App\StudentInfo','user_id','id');
    }
}
