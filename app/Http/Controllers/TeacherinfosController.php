<?php

namespace App\Http\Controllers;

use App\Teacherinfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherinfosController extends Controller
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
        $profile->teacher = DB::table('teacherinfos')->where('profile_id',$profile->id)->first();
        $profile->teacher->major = DB::table('majors')->where('id',$profile->teacher->major_id)->first();
        $profile->teacher->major->faculty = DB::table('faculties')->where('id',$profile->teacher->major->faculty_id)->first();

        $students = DB::table('student_infos')->where('faculty_id',$profile->teacher->major->faculty->id)->orderBy('number')->get();
       
            foreach($students as $stu){
                $stu->joincomevent = DB::table('comevent_joins')->where('stu_id',$stu->id)
                ->where('stu_confirm',1)
                ->first();
                if($stu->joincomevent != null){
                   $stu->joincomevent->comevent = DB::table('comevents')->where('id', $stu->joincomevent->event_id)->first();
                   $stu->joincomevent->company = DB::table('companyinfos')->where('id', $stu->joincomevent->com_id)->first();
                }
            
            }


        return $students;
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
     * @param  \App\Teacherinfos  $teacherinfos
     * @return \Illuminate\Http\Response
     */
    public function show(Teacherinfos $teacherinfos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacherinfos  $teacherinfos
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacherinfos $teacherinfos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacherinfos  $teacherinfos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacherinfos $teacherinfos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacherinfos  $teacherinfos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacherinfos $teacherinfos)
    {
        //
    }
}
