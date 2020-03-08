<?php

namespace App\Http\Controllers;

use App\Comevent;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comevents = Comevent::orderBy('created_at', 'desc')->get();
        foreach($comevents as $com){
            // $com->staff->company;
            $com->company;
            // foreach($com->staffs as $staff){
            //     // $staff->company;
            // }
            // $com->company;
        }
        return $comevents;
    }

    public function getcomevent(Request $request)
    {   
        $user = $request->user();
        $infos = Profile::where('user_id',$user->id)->select('com_id')->get();
        $event = DB::table('comevents')->where('com_id',$infos[0]->com_id)->get();
        return $event;
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
        $comevent = Comevent::create($request->all());

        return $comevent;
    }
 
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function show(Comevent $comevent)
    {
        $comevent->staffs;
        $comevent->company;
        return $comevent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function edit(Comevent $comevent)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comevent $comevent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comevent  $comevent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comevent $comevent)
    {
        $comevent->delete();
        return 'delete';
    }
}
