<?php

namespace App\Http\Controllers;

use App\Comevent;
use App\ComeventJoin;
use App\Profile;
use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComeventJoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $user_joins = ComeventJoin::where('user_id',$user->id,)
        ->orderBy('id')
        ->get();
        foreach($user_joins as $com){
            $com->comevent->company;
        }
       
        return $user_joins;
    }

    public function getstudent(Request $request)
    {
        $user = $request->user();

        //ต้องเอา id ของ Companyinfo
        $infos = Profile::where('user_id',$user->id)->get();
        foreach($infos as $info){
            $usercom_id = $info->company->id;
        }

        $comjoins = ComeventJoin::where('com_id','=', $usercom_id)
        ->where('stu_confirm','=',0)
        ->get();
        foreach($comjoins as $com){
            $com->student->major->faculty->university;
            $com->comevent;
            $com->student->course;
        }

       return $comjoins;
       
    }

    public function getjoptype(Request $request)
    {
        $user = $request->user();

        $infos = Profile::where('user_id',$user->id)->get();
        foreach($infos as $info){
            $usercom_id = $info->company->id;
        }
        $requirement = [];
        $comjoins = Comevent::where('com_id','=', $usercom_id)->get();
        foreach($comjoins as $index=>$com){
            $arrayjob = explode(',',$com->requirement);
            $requirement = array_unique(array_merge($requirement,$arrayjob));
        }
       return $requirement;
       
    }

    public function studentconfirm(Request $request)
    {
        $user = $request->user();

        //ต้องเอา id ของ Companyinfo
        $infos = Profile::where('user_id',$user->id)->get();
        foreach($infos as $info){
            $usercom_id = $info->company->id;
        }


        $comjoins = ComeventJoin::where('com_id','=', $usercom_id)
        ->where('stu_confirm','=',1)
        ->get();

        foreach($comjoins as $com){     
           $com->student->major->faculty->university;
           $com->comevent ;
           $com->student->course;
        }
        

       return $comjoins;
       
    }
    
    public function internstepconfirm(Request $request)
    {
        $user = $request->user();

        $user = $request->user();
        $user_joins = ComeventJoin::where('user_id',$user->id,)
        ->where('stu_confirm',1)
        ->get();

        foreach($user_joins as $com){
            $com->comevent->company;
            $com->comevent->staff;
            $com->student->teacher;
            $com->student->course;
            $com->student->major->faculty->university;
        }

        return $user_joins;

       
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
        $comjoin = ComeventJoin::create($request->all());
        $comjoin->update([
            'user_id'=>$user->id
        ]);

        return $comjoin;
    }

    public function cominvite(Request $request)
    {
        $profiles = DB::table('profiles')->where('user_id',$request->user_id)->first();
        $student_infos = DB::table('student_infos')->where('profile_id',$profiles->id)->first();
        $toStr =  implode(',',$request->val);
        $value = explode(',',$toStr);
        $event_id = $value[0];
        $jobtype = $value[1];
        $cominvite = ComeventJoin::create([
            'user_id' => $request->user_id,
            'jobtype' => $jobtype,
            'event_id' => $event_id,
            'stu_id' => $student_infos->id,
            'com_id' => $request->com_id,
            'result' => 50,
            'course_id' => $student_infos->course_id,
        ]); 


        return $cominvite;
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function show(ComeventJoin $comeventJoin ,$id )
    {   
        // $comeventJoin->getstudent()
        // $comeventJoin->student;
        // return $comeventJoin;
    }

    public function showcomjoin(ComeventJoin $comeventJoin ,$id )
    {
        $comeventJoin = ComeventJoin::find($id);
        $comeventJoin->student->course;
        $comeventJoin->student->major->faculty->university;
        $comeventJoin->comevent;
        return $comeventJoin;
    }

    public function showstudentconfirm(ComeventJoin $comeventJoin ,$id )
    {
        $comeventJoin = ComeventJoin::find($id);
        $comeventJoin->student;
        $comeventJoin->comevent;
        return $comeventJoin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function edit(ComeventJoin $comeventJoin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $comeventJoin = ComeventJoin::find($id);
        
        $stu_id = $request->stu_id;
        $studentJoin = StudentInfo::find($stu_id);

        if ($request->get == '1'){
            $comeventJoin->update([
                'check' => $request->check,
            ]);
        } else if ($request->get == '2'){
            $comeventJoin->update([
                'interview' => $request->interview,
                'result' => $request->result,
            ]);
        } else if ($request->get == '3'){
            $comeventJoin->update([
                'stu_confirm' => $request->stu_confirm,
            ]);
            $studentJoin->update([
                'intern_id' => 2,
            ]);
        }
       

        return $comeventJoin;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComeventJoin $comeventJoin)
    {
        //
    }
}
