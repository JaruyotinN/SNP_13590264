<?php

namespace App\Http\Controllers;

use App\StudentInfo;
use App\StudentPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $user = $request->user();
        $studentpost = StudentPost::orderBy('created_at')
        ->where('user_id',$user->id)->get();
        foreach($studentpost as $post){
            $post->student;
        }
        return $studentpost;
    }

    public function studentdairy(Request $request)
    {
        $user = $request->user();

        $profile = DB::table('profiles')->where('user_id',$user->id)->first();
        $profile->teacher = DB::table('teacherinfos')->where('profile_id',$profile->id)->first();
        $profile->teacher->major = DB::table('majors')->where('id',$profile->teacher->major_id)->first();
        $profile->teacher->major->faculty = DB::table('faculties')->where('id',$profile->teacher->major->faculty_id)->first();

        $students = DB::table('student_infos')->where('faculty_id',$profile->teacher->major->faculty->id)->orderBy('number')->get();
       
            foreach($students as $stu){
                $stu->dairy = DB::table('student_posts')->where('stu_id',$stu->id)->get();
                if($stu->dairy != null){
                    $stu->count = DB::table('student_posts')->where('stu_id',$stu->id)->count();
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
        $user = $request->user();
        $posts = StudentPost::create($request->all());
        foreach($posts as $post){
            $post->student;
        }
       
        return $posts;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentPost  $studentPost
     * @return \Illuminate\Http\Response
     */
    public function show(StudentPost $studentPost,$id)
    {   
        $studentPost = StudentPost::orderBy('created_at')->where('stu_id',$id)->get();
        foreach($studentPost as $post){
            $post->student;
        }
        return  $studentPost;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentPost  $studentPost
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentPost $studentPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentPost  $studentPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentPost $studentPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentPost  $studentPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentPost $studentPost)
    {
        //
    }
}
