<?php

namespace App\Http\Controllers;

use App\StudentCoutse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCoutseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = StudentCoutse::get();
        foreach($courses as $course){
            $course->majors;
        }
        return $courses;

    }

    public function course(Request $request)
    {   
        $user = $request->user();
        $profile = DB::table('profiles')->where('user_id',$user->id)->first();
        $profile->teacher = DB::table('teacherinfos')->where('profile_id',$profile->id)->first();
        
        $courses = StudentCoutse::where('faculty_id',$profile->teacher->faculty_id)->get();
        
        return $courses;

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
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function show(StudentCoutse $studentCoutse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentCoutse $studentCoutse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentCoutse $studentCoutse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentCoutse $studentCoutse)
    {
        //
    }
}
