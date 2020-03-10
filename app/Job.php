<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function jobtypes(){
        return $this->hasMany('App\Joptype','job_id','id');
    }
}
