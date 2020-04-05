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
        $user = $request->user();
        $arrayuserjob = [];

        
        $comevent = DB::table('scores')
            ->where('user_id','=',$user->id)
            ->join('joptypes','scores.type_id','=','joptypes.id')
            ->join('jobs','jobs.id','=','joptypes.job_id')
            ->select('jobs.id')
            ->get();

        //ต้องเอา id ของ Companyinfo
        // foreach($userjobs as $index=>$e){
        //     $arrayuserjob[$e];
        // }

        //ประกาศไว้้เก็บค่า
        $positions = [];
        $prices = [];
        $persons = [];

        $arraycomevent = [];
        $arrayjob = [];
        
        //หาประเภทงานที่ user กำหนด
        $userjobs = Score::where('user_id','=',$user->id)->get();
        foreach($userjobs as $index=>$userjob){
            $arrayjob[$index] =  $userjob->joptype->job_id;
        }

         //แยกไม่ให้มีซ้ำ
        $uniquejobid = array_unique($arrayjob); 
        $jobidtostring = implode(',',$uniquejobid);
        $explodeuserjobs =  explode(',', $jobidtostring);
        $getcom = [];
        // foreach($ex as $index=>$e){
        //                 $positions[] = $e;
        //                 if(!empty($ex_bd)){
        //                     $prices[$e] = $ex_bg[$index];
        //                 }
        //                 if(!empty($ex_ps)){
        //                     $persons[$e] = $ex_ps[$index];
        //                 }
        // }
        //index คือขนาดของ explodeuserjobs 0,1,2  //$e คือข้อมูลที่อยู่ในนั้น
            // $comevents = Comevent::orderBy('created_at', 'desc')
            // ->where('job_id','like','%'.$explodeuserjobs.'%')->get();
 

        // $users = User::where('username','like','%'.$username.'%')
        // ->orWhere('email','like','%'.$username.'%')
        // ->orWhere('name','like','%'.$username.'%')
        // ->orWhere('aka','like','%'.$username.'%')
        // ->get();
        //index คือขนาดของ explodeuserjobs 0,1,2  //$e คือข้อมูลที่อยู่ในนั้น
        // $comevents = Comevent::orderBy('created_at', 'desc')->get();
        //     foreach($comevents as $com){
        //         $comjobid =  explode(',',$com->job_id);
        //         $show = 0;
        //         foreach($explodeuserjobs as $index=>$e){
        //         foreach($comjobid as $num=>$com){
        //             if($explodeuserjobs[$index] == $comjobid[$num]){
        //                $show = 1;
        //             }
        //         }
        //     }     
        // }

        // $merged = collect($arrays2)->map(function ($value) use ($arrays1)  {

        //     foreach($arrays1 as $array){
        //         if($value["bulk_id"]==$array["bulk_id"]){
        //             $value["itemId"] = $array["itemId"];
        //         }
        //     }
    
        //     return $value;
        // });
    

        //  $comevents = Comevent::orderBy('created_at', 'desc')->get();
        //  foreach($comevents as $com){
        //         $comjobid =  explode(',',$com->job_id);
        //         //แยกค่าของ User แต่ละตัว
  

                
        //         // $arraycomevent[$index] = $ex;
        //             // if($comeventjobid == $userjobid){
        //             //     $getcomevents = Comevent::where('id', $com->id)->get();
        //             //     foreach($getcomevents as $getcom){
        //             //     $getcom->company;
        //             // }
        // }
        
        // if(!empty($post_team->pre_position_id)){  
        //     $ex =  explode(',',$post_team->pre_position_id); 
        //     $ex_bg = explode(',',$post_team->prebudget); 
        //     $ex_ps = explode(',',$post_team->pre_person); 
        //     if(!empty($ex)){
        //         foreach($ex as $index=>$e){
        //             $positions[] = $e;
        //             if(!empty($ex_bd)){
        //                 $prices[$e] = $ex_bg[$index];
        //             }
        //             if(!empty($ex_ps)){
        //                 $persons[$e] = $ex_ps[$index];
        //             }
        //         }
        //     }
        // }
        
        // $search = Comevent::where('job_id','like','%'.$get_job.'%')
        //     ->orWhere('requirement','like','%'.$username.'%')
        //     ->orWhere('name','like','%'.$username.'%')
        //     ->orWhere('aka','like','%'.$username.'%')
        //     ->get();
        // return $users;

        // TRY FIND IN ARRAY 

            // $array1 = array(20, 11, 29, 88);
            // $array2 = array(29, 20, 1, 2, 1, 27);
                
    
            
        // TRY FIND IN ARRAY 

        // $comevents = Comevent::orderBy('created_at', 'desc')->get();

        // $get_comevents = Comevent::all();
        // foreach ($get_comevents as $get_comevent){
        //         foreach ($get_comevent as $cmjob){
        //                $get_comevent->job_id = explode(',',$get_comevent->job_id); 
                    // foreach ( $cmjob as $cm){ 
                    //     $comevents = Comevent::orderBy('created_at', 'desc')
                    //     ->where('job_id','=',$cm)
                    //     ->get();
                    // }
        //         }
        // }

        // foreach($com_job as $comjb){
            // $comevents = Comevent::orderBy('created_at', 'desc')
            // ->where('job_id','=',$comjb)
            // ->get();
        // }
        // $result = explode(',', $get_comevent->job_id);
            // foreach($result as $v) {
                
            // }
        // SELECT * FROM comevents	WHERE job_id = 8

        $comevents = Comevent::orderBy('created_at', 'desc')->get();
        foreach($comevents as $com){
            // $com->staff->company;
            $com->company;
            // foreach($com->staffs as $staff){
            //     // $staff->company;
            // }
            // $com->company;
        }
        return   $comevents;
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
