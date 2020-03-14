<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = $request->user();
        $infos = Profile::where('user_id',$user->id)->get();
         
        if($infos[0]->profile_type == 'S'){
            $getinfo = Profile::where('profile_type','S')->whereHas('student', function ($query) use ($user) {
                $query->where('user_id',$user->id);
            })->get();

            foreach($getinfo as $info){
                $info->student->major->faculty->university;
                $info->student->scores;
                foreach($info->student->scores as $score){
                    $score->joptype;
                }
            } 
        } else if($infos[0]->profile_type == 'T'){
            $getinfo = Profile::where('profile_type','T')->whereHas('teacher', function ($query) use ($user) {
                $query->where('user_id',$user->id);
            })->get();

            foreach($getinfo as $info){
                $info->teacher->major->faculty->university;
            } 
        } else if($infos[0]->profile_type == 'C'){
            $getinfo = Profile::where('profile_type','C')->whereHas('company', function ($query) use ($user) {
                $query->where('user_id',$user->id);
            })->get();

            foreach($getinfo as $info){
                $info->company;
            } 
        } 
        // else if($infos[0]->profile_type == 'T'){
        //     $info = DB::table('profiles')
        //     ->join('users', 'profiles.user_id', '=', 'users.id')
        //     ->join('teacherinfos', 'teacherinfos.profile_id', '=', 'profiles.id')
        //     ->where('user_id',$user->id)->get();   
        // }
        // else if($infos[0]->profile_type == 'C'){
        //     $info = DB::table('profiles')
        //         ->join('users', 'profiles.user_id', '=', 'users.id')
        //         ->join('infopanyinfos', 'infopanyinfos.profile_id', '=', 'profiles.id')
        //         ->where('user_id',$user->id)->get();   
        // }
        return $getinfo;
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile ,$id)
    {
        $profile = Profile::find($id);
        $profile->student->major->faculty->university;
        foreach($profile->student->scores as $score){
            $score->joptype->job;
        }

        return $profile;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
