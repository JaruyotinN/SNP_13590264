<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCoutse extends Model
{
    protected $fillable = ['name','description','start_date','end_date','faculty_id'];
    
    public function majors(){
        return $this->hasMany('App\Major','faculty_id','id');
    }

}
