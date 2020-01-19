<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comevent extends Model
{
    protected $fillable = ['desciption','quantity','requirement','img','enddate','question1','question2','com_id'];
    public function staff(){
        return $this->hasOne('App\CompanyStaff','event_id','id')->latest();
    }
    public function staffs(){
        return $this->hasMany('App\CompanyStaff','event_id','id');
    }
    public function company(){
        return $this->belongsTo('App\Companyinfos','com_id','id');
    }

}
