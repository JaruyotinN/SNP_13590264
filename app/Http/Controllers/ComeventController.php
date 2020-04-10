<?php

namespace App\Http\Controllers;

use App\Comevent;
use App\Job;
use App\Joptype;
use App\Profile;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $user = $request->user(); //เอาข้อมูล User
        $arrayjob = []; //ประกาศตัวแปลเก็บ job_id ของ user 
        $arraycomjob = []; //ประกาศตัวแปลเก็บ com_id ของ comevent ที่ตรงกับค่าของ user 

        $userjobs = Score::where('user_id','=',$user->id)->get(); //หาหมวดหมู่ job ที่ user กรอกคะแนน
        foreach($userjobs as $index=>$userjob){ 
            $arrayjob[$index] =  $userjob->joptype->job_id;
            //นำมา loop เอา job_id ของแต่ละ jobtype เก็บไว้ใน arrayjob
        } 

        $uniquejobid = array_unique($arrayjob); //ค่าใน arrayjob เอาค่าไม่ซ้ำ
       

        $getcomevents = Comevent::orderBy('created_at', 'desc')->get(); //เรียก comevent ทั้งหมด
        foreach($getcomevents as $com){ //loop เพื่อแสดงทุกค่าใน comevent 
        $comjobid =  explode(',',$com->job_id); //แยก , ออกจาก job_id เช่น 7,8,9 
            foreach($comjobid as $index=>$c){ //นำค่าแต่ละค่ามา loop loop1 : 7 , loop2 : 8 , loop3 : 9
                foreach($uniquejobid as $uni){ //loop ค่าที่ไม่ซ้ำกันของ job_id ที่ user เลือก
                    if($c == $uni){ //เงื่อนไข ถ้าค่า job_id ของ comevent ตรงกับ job_id ของ user ให้ทำ
                        $arraycomjob[] = $com->id; //นำ comevent id ไปเก็บใน arraycomjob
                    }
                }
            }       
        }

        $uniquecomjob = array_unique($arraycomjob); //ค่าใน arraycomjob เอาค่าไม่ซ้ำ
        $comevents = Comevent::orderBy('created_at', 'desc')
        ->whereIn('id', $uniquecomjob)->get();  //หา comevents ที่มีใน array uniquecomjob
            foreach($comevents as $com){
                $com->company; //เชื่อมข้อมูลใน module เอาข้อมูล company
            }
            return $comevents;
        
    }

    public function getcomevent(Request $request)
    {   
        $user = $request->user();
        $infos = Profile::where('user_id',$user->id)->select('com_id')->get();
        $event = DB::table('comevents')->where('com_id',$infos[0]->com_id)->get();
        return $event;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $comevent = Comevent::create($request->all());

        return $comevent;
    }
 
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function show(Comevent $comevent)
    {
        $comevent->staffs;
        $comevent->company;
        return $comevent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function edit(Comevent $comevent)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comevent $comevent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comevent $comevent)
    {
        $comevent->delete();
        return 'delete';
    }
}
