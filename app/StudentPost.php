<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPost extends Model
{
    protected $fillable = ['title','desciption','img'];
    public function post(){
        return $this->belongsTo('App\StudentInfo','user_id','id');
    }
}
