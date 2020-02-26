<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{   
     public function student(){
         return $this->hasOne('App\StudentInfo','profile_id','id');
     }
     public function company(){
         return $this->hasOne('App\Companyinfos','profile_id','id');
     }
     public function teacher(){
         return $this->hasOne('App\Teacherinfos','profile_id','id');
     }
     
     public function getProfile(){
         $trans = User::where('user_id', $this->id);
         return $trans;
     }

    
    
}
