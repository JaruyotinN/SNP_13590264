<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyinfos extends Model
{
    public function company(){
        return $this->hasOne('App\Companyinfos','id','id');
    }
    public function event(){
        return $this->hasMany('App\Comevent','com_id','id');
    }
    public function companyinfo(){
        return $this->belongsTo('App\Profile','profile_id','id');
    }
    public function profile(){
        return $this->belongsTo('App\Profile','user_id','id');
    }
}
