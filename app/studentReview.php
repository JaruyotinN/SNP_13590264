<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentReview extends Model
{
    protected $fillable = ['id','knowledge01','knowledge02','knowledge03','knowledge04','entrust01','entrust02','entrust03','personality01','personality02','personality03','cmknowledge','cmentrust','cmpersonality','reviews_note','stu_id','comevent_joins_id'];
}
