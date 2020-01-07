<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyinfos extends Model
{
    public function company(){
        return $this->hasOne('App\Companyinfos','id','id');
    }
}
