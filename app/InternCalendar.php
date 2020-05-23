<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternCalendar extends Model
{
    protected $fillable = ['uni_id','description','start_date','end_date','faculty_id'];
}
