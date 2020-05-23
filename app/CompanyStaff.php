<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyStaff extends Model
{   
    protected $fillable = ['name','surname','career','email','phonenumber','com_id'];
    public function company(){
        return $this->belongsTo('App\Companyinfos','com_id','id');
    }

}
