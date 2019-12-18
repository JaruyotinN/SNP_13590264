<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyStaff extends Model
{
    public function company(){
        return $this->belongsTo('App\Companyinfos','com_id','id');
    }



}
