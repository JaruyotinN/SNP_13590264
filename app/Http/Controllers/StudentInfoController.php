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
        // $studentInfo= StudentInfo::get();
        // return $studentInfo;
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

            if ($request->get == '1'){
                $Student->update([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'number' => $request->number,
                    'img' => $request->img,
                ]);
            } else if ($request->get == '2'){
                $Student->update([
                    'port' => $request->port,
                    'cv' => $request->cv,
                    'url_port' => $request->url_port,
                ]);
            } else if ($request->get == '4'){
                $Student->update([
                    'intern_id' => 3,
                ]);
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
