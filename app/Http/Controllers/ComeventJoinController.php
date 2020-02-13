<?php

namespace App\Http\Controllers;

use App\ComeventJoin;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComeventJoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $user_joins = ComeventJoin::where('user_id',$user->id)
        ->join('comevents', 'comevent_joins.event_id', '=', 'comevents.id')
        ->join('companyinfos', 'comevents.com_id', '=', 'companyinfos.id')->get();

        return $user_joins;
    }
    public function getstudent(Request $request)
    {
        $user = $request->user();
        $comjoin = DB::table('profiles')
                ->join('users', 'profiles.user_id', '=', 'users.id')
                ->join('companyinfos', 'companyinfos.profile_id', '=', 'profiles.id')
                ->join('comevents', 'comevents.com_id', '=', 'companyinfos.id')
                ->join('comevent_joins', 'comevent_joins.event_id', '=', 'comevents.id')
                ->join('student_infos', 'comevent_joins.stu_id' ,'=', 'student_infos.id')

        ->get();

        // foreach($comjoin as $com){
           
        // }
        return $comjoin;
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
        $comjoin = ComeventJoin::create($request->all());
        $comjoin->update([
            'user_id'=>$user->id
        ]);

        return $comjoin;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function show(ComeventJoin $comeventJoin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function edit(ComeventJoin $comeventJoin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComeventJoin $comeventJoin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComeventJoin  $comeventJoin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComeventJoin $comeventJoin)
    {
        //
    }
}
