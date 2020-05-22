<?php

namespace App\Http\Controllers;

use App\InternCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $profile = DB::table('profiles')->where('user_id',$user->id)->first();
        if($profile->profile_type == 'S'){
            $profile->student = DB::table('student_infos')->where('profile_id',$profile->id)->first();
            $courses = InternCalendar::where('faculty_id',$profile->student->faculty_id)->get();

        } else if ($profile->profile_type == 'T'){
            $profile->teacher = DB::table('teacherinfos')->where('profile_id',$profile->id)->first();
            $courses = InternCalendar::where('faculty_id',$profile->teacher->faculty_id)->get();
        }
      
        
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
     * @param  \App\InternCalendar  $internCalendar
     * @return \Illuminate\Http\Response
     */
    public function show(InternCalendar $internCalendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternCalendar  $internCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit(InternCalendar $internCalendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InternCalendar  $internCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternCalendar $internCalendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternCalendar  $internCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternCalendar $internCalendar)
    {
        //
    }
}
