<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{   
     public function student(){
         return $this->belongsTo('App\StudentInfo','profile_id','id');
     }
     public function company(){
         return $this->belongsTo('App\Companyinfos','profile_id','id');
     }
     public function teacher(){
         return $this->belongsTo('App\Teacherinfos','profile_id','id');
     }
    
}
