<?php

namespace App\Http\Controllers;

use App\Joptype;
use App\Score;
use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

     public function search(Request $request)
    {   

        // $intern_id = 1 ;
        

        // if($form->jobtyoes_id != ""){
        //     $users = Score::where('type_id',$form->jobtypes_id)
        //     ->where('score',$form->score)
        //     ->whereHas('student', function ($query) use ($intern_id){
        //                 $query->where('intern_id', $intern_id);
        //     })->get();
        // } else { 
            
        //      $users = Score::whereHas('student', function ($query) use ($intern_id){
        //                  $query->where('intern_id', $intern_id);
        //      })->get();
        // }
        // foreach($users as $user){
        //     $user->student->major->faculty->university;
        //     $user->student->scores;
        //     foreach($user->student->scores as $score){
        //         $score->joptype;
        //     }
        // }
        // foreach($profile->student->score as $key => $value){
        //         if($value->type_id!=''){
        //             $profile->student->score[$key]->joptypes = DB::table('joptypes')->where('id',$value->type_id)->get();
        //         }
        //     }

            // return  $users;

        $user = $request->user();  
        $profile = DB::table('profiles')->leftJoin('student_infos','student_infos.profile_id','profiles.id')
                        ->where('profile_type','S')
                        ->where('intern_id',1)
                        ->get();  //ได้รายชื่อนักเรียน


        
        //  dd($profile);die();
        
        foreach($profile as $key => $value){
            $profile[$key]->student = DB::table('student_infos')->where('profile_id',$value->id)->first();
            $profile[$key]->score = DB::table('scores')->where('user_id',$value->user_id)->get();
            $profile[$key]->major = DB::table('majors')->where('id',$value->major_id)->first();
            $profile[$key]->faculty = DB::table('faculties')->where('id',$value->faculty_id)->first();
            $profile[$key]->university = DB::table('universities')->where('id',$profile[$key]->faculty->uni_id)->first();
            foreach($profile[$key]->score as $kkey => $vvalue){
                $profile[$key]->score[$kkey]->types = DB::table('joptypes')->where('id',$vvalue->type_id)->first();
            }
        }

        if($request->job_id){
            $temp = [];
            foreach($profile as $key => $value){ // loop student
                foreach($value->score as $kkey => $vvalue){ //loop
                    if($vvalue->type_id == $request->jobtypes_id && $vvalue->score >= $request->score){ // 2 >= 1
                        array_push($temp,$value);
                    }
                }
            }
            return $temp;
        }


        // dd($profile);die();

        return  $profile;
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        for($s = 0; $s < 4 ; $s++){
            $score_id = DB::table('scores')->where('id',$request->index[$s])->update([
                'score' => $request->score[$s],
                'type_id' => $request->name[$s],
                 ]);
        }
       return $score_id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
