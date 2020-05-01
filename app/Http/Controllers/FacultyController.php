<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
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
        $profile->teacher->faculty = DB::table('faculties')->where('id',$profile->teacher->faculty_id)->first();
      

        $majors = Major::where('faculty_id',$profile->teacher->faculty->id)->get();
        foreach($majors as $major){
            $major->faculty;
 
        }
        return $majors;
        
    }
    public function getfaculty()
    {    
       
        $data['university'] = DB::table('universities')->get();
        $data['faculty'] = DB::table('faculties')->get();
        $data['major'] = DB::table('majors')->get();
        return $data;
        
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
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
