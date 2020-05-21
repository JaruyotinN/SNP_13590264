<?php

namespace App\Http\Controllers;

use App\StudentInfo;
use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $studentInfos = StudentInfo::get();
        dd($studentInfos);
        return $studentInfos;
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
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    public function show(StudentInfo $studentInfo, $id)
    {   
        $studentInfo = StudentInfo::find($id);
        return $studentInfo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentInfo $studentInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {   
        $Student = StudentInfo::find($id);
        $date = strtotime(date("Y-m-d"));
       

            if ($request->get == '1'){
                if($Student->img != $request->img){
                    @unlink(public_path($Student->img));
                }  
                $Student->update([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'number' => $request->number,
                    'img' => $request->img,
                    'grade' => $request->grade,
                    'phonenumber' => $request->phonenumber,
                    'course_id' => $request->course_id,
                ]);
            } else if ($request->get == '2'){
                if($Student->port != $request->port){
                    @unlink(public_path($Student->port));
                }
                if($Student->cv != $request->cv){
                    @unlink(public_path($Student->cv));
                }
                if($Student->transcript != $request->transcript){
                    @unlink(public_path($Student->transcript));
                }
                $Student->update([
                    'port' => $request->port,
                    'cv' => $request->cv,
                    'transcript' => $request->transcript,
                    'url_port' => $request->url_port,
                    'url_port2' => $request->url_port2,
                ]);
            } else if ($request->get == '4'){
                $Student->update([
                    'intern_id' => 3,
                ]);
            } else if ($request->get == '5'){
                $Student->update([
                    'intern_id' => 4,
                ]);
            } else if ($request->get == '6'){
                $start = strtotime($request->startdate);
              
                 if($date >= $start){
                    $Student->update([
                        'intern_id' => 6,
                    ]);
                 } else {
                    $Student->update([
                        'intern_id' => 5,
                    ]);
                 }
            } else if ($request->get == '7'){
                $end = strtotime($request->enddate);

                if($date >= $end){
                   $Student->update([
                       'intern_id' => 7,
                   ]);
                } else {
                   $Student->update([
                       'intern_id' => 6,
                   ]);
                }
           } 
           
        return $Student;
        
    }
    // public function update(Request $request, StudentInfo $studentInfo)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentInfo $studentInfo)
    {
        //
    }
}
