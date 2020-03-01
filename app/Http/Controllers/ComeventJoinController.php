<?php

namespace App\Http\Controllers;

use App\ComeventJoin;
use App\Companyinfos;
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

        //ต้องเอา id ของ Companyinfo
        $infos = Profile::where('user_id',$user->id)->get();
        foreach($infos as $info){
            $company_id = $info->company;
        }

        //whereHas คือการ where ด้วย Model 
        $comjoins = Profile::where('profile_type','S')->whereHas('student', function ($query) use ($company_id){
            $query->whereHas('comevent_joins',function($query) use ($company_id){
                $query->whereHas('comevent',function($query) use ($company_id) {
                    $query->where('com_id', $company_id->id);
                }); 
            });
        })->get();

        //ข้อมูลที่ได้เป็น Array 
       foreach($comjoins as $com){
           $com->student->comevent_joins;
       }

       return $comjoins;
       
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
    public function show(ComeventJoin $comeventJoin ,$id )
    {   
        // $comeventJoin->getstudent()
        // $comeventJoin->student;
        // return $comeventJoin;
    }

    public function showcomjoin(ComeventJoin $comeventJoin ,$id )
    {
        $comeventJoin = ComeventJoin::find($id);
        $comeventJoin->student;
        return $comeventJoin;
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
