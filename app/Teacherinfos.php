<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherinfos extends Model
{
    public function teacherinfo(){
        return $this->belongsTo('App\Profile','profile_id','id');
    }
}
