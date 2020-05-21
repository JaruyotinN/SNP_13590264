<?php

namespace App\Http\Controllers;

use App\CompanyStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyStaffController extends Controller
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
        $profile->company = DB::table('companyinfos')->where('profile_id',$profile->id)->first();
        
        $staffs = CompanyStaff::where('com_id',$profile->company->id)->get();
        return $staffs;
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
        $staff = CompanyStaff::create($request->all());

        return $staff;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyStaff  $companyStaff
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyStaff $companyStaff ,$id)
    {
        $companyStaff  = CompanyStaff::find($id);
        return $companyStaff ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyStaff  $companyStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyStaff $companyStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyStaff  $companyStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $staff = CompanyStaff::find($id);
        $staff->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'career' => $request->career,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
        ]);
        return $staff;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyStaff  $companyStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyStaff $companyStaff)
    {
        //
    }
}
