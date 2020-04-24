<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comevent extends Model

{
    protected $fillable = ['division','desciption','quantity','jobtime','reward','staff_id','requirement','img','enddate','question1','question2','job_id','com_id','invite'];
    public function staff(){
        return $this->belongsTo('App\CompanyStaff','staff_id','id');
    }
    public function company(){
        return $this->belongsTo('App\Companyinfos','com_id','id');
    }
    public function eventjoin(){
        return $this->hasMany('App\ComeventJoin','event_id','id');
    }
    
    

}
