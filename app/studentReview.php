<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentReview extends Model
{
    protected $fillable = ['id','knowledge01','knowledge02','knowledge03','knowledge04','entrust01','entrust02','entrust03','personality01','personality02','personality03','cmknowledge','cmentrust','cmpersonality','reviews_note','stu_id','comevent_joins_id'];

    public function comeventjoin(){
        return $this->belongsTo('App\ComeventJoin','comevent_joins_id','id');
    }
    public function student(){
        return $this->belongsTo('App\StudentInfo','stu_id','id');
    }
}
