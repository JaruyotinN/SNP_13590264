<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    public function studentinfo(){
        return $this->belongsTo('App\Profile','profile_id','id');
    }
}
