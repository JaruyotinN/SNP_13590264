<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherinfos extends Model
{   
    protected $fillable = ['profile_id','name','surname','email','img','phonenumber','address','uni_id','faculty_id','major_id'];
    public function teacherinfo(){
        return $this->belongsTo('App\Profile','profile_id','id');
    }
    public function major(){
        return $this->belongsTo('App\Major','major_id','id');
    }
}
