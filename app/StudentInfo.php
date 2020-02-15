<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = ['profile_id','name','surname','number','img','address','port','cv','url_port','sentinvite','intern_id','major_id','teacher_id'];
}
