<?php

namespace App\Http\Controllers;

use App\ComeventJoin;
use App\Profile;
use App\StudentInfo;
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
        $user_joins = ComeventJoin::where('user_id',$user->id,)
        ->orderBy('id')
        ->get();
        foreach($user_joins as $com){
            $com->comevent->company;
        }

        return $user_joins;
    }

    public function getstudent(Request $request)
    {
        $user = $request->user();

        //ต้องเอา id ของ Companyinfo
        $infos = Profile::where('user_id',$user->id)->get();
        foreach($infos as $info){
            $usercom_id = $info->company->id;
        }

        $comjoins = ComeventJoin::where('com_id','=', $usercom_id)->get();
        foreach($comjoins as $com){
            $com->student;
            $com->comevent;
        }

       return $comjoins;
       
    }

    public function studentconfirm(Request $request)
    {
        $user = $request->user();

        //ต้องเอา id ของ Companyinfo
        $infos = Profile::where('user_id',$user->id)->get();
        foreach($infos as $info){
            $usercom_id = $info->company->id;
        }

        // $cm = DB::table('comevent_joins')
        //     ->join('student_infos', 'student_infos.id', '=', 'comevent_joins.stu_id')
        //     ->where('comevent_joins.stu_confirm','=',1)
        //     ->where('student_infos.intern_id','<=',5)
        //     ->get();

        $comjoins = ComeventJoin::where('com_id','=', $usercom_id)
        ->where('stu_confirm','=',1)
        ->get();

        foreach($comjoins as $com){     
           $com->student;
           $com->comevent ;
        }
        

       return $comjoins;
       
    }

    // public function studentconfirm(Request $request)
    // {
    //     $user = $request->user();

    //     //ต้องเอา id ของ Companyinfo
    //     $infos = Profile::where('user_id',$user->id)->get();
    //     foreach($infos as $info){
    //         $company_id = $info->company;
    //     }

    //     //whereHas คือการ where ด้วย Model 
    //     $comjoins = Profile::where('profile_type','S')->whereHas('student', function ($query) use ($company_id){
    //         $query->whereHas('comevent_joins',function($query) use ($company_id){
    //             $query->whereHas('comevent',function($query) use ($company_id) {
    //                 $query->where('com_id', $company_id->id);
    //             }); 
    //         });
    //     })->get();

    //     //ข้อมูลที่ได้เป็น Array 
        
    //    foreach($comjoins as $com){
    //      $conf = $com->student->comevent_joins->stu_confirm;
    //      $int_id   = $com->student->intern_id;
    //      if ($conf == '1' &&  $int_id <= 6 ){
    //          $com->student->comevent_joins->comevent ;
    //      }
    //    }

    //    return $comjoins;
       
    // }
    


   
    
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
        $comeventJoin->comevent;
        return $comeventJoin;
    }

    public function showstudentconfirm(ComeventJoin $comeventJoin ,$id )
    {
        $comeventJoin = ComeventJoin::find($id);
        $comeventJoin->student;
        $comeventJoin->comevent;
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
    public function update(Request $request, $id)
    {   
        $comeventJoin = ComeventJoin::find($id);
        
        $stu_id = $request->stu_id;
        $studentJoin = StudentInfo::find($stu_id);

        if ($request->get == '1'){
            $comeventJoin->update([
                'check' => $request->check,
            ]);
        } else if ($request->get == '2'){
            $comeventJoin->update([
                'interview' => $request->interview,
                'result' => $request->result,
            ]);
        } else if ($request->get == '3'){
            $comeventJoin->update([
                'stu_confirm' => $request->stu_confirm,
            ]);
            $studentJoin->update([
                'intern_id' => 2,
            ]);
        }
       

        return $comeventJoin;
        
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
