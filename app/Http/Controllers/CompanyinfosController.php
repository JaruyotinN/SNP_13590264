<?php

namespace App\Http\Controllers;

use App\Companyinfos;
use Illuminate\Http\Request;

class CompanyinfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = $request->user();
        $company = Companyinfos::where('id',$user->id)->get();
        
        // foreach($company as $com){
        //     // $com->staff->company;
        //     $com->company;
        //     // foreach($com->staffs as $staff){
        //     //     // $staff->company;
        //     // }
        //     // $com->company;
        // }
        return $company;
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
     * @param  \App\Companyinfos  $companyinfos
     * @return \Illuminate\Http\Response
     */
    public function show(Companyinfos $companyinfos)
    {
        $companyinfos->company;
        return $companyinfos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companyinfos  $companyinfos
     * @return \Illuminate\Http\Response
     */
    public function edit(Companyinfos $companyinfos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companyinfos  $companyinfos
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
       $Company = Companyinfos::find($id);
       if($Company->logo != $request->logo){
        @unlink(public_path($Company->logo));
       }
       $Company->update([
        'name' => $request->name,
        'address' => $request->address,
        'logo' => $request->logo,
        'email' => $request->email,
        'phonenumber' => $request->phonenumber,
        'province_id' => $request->province_id,
        'amphure_id' => $request->amphure_id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companyinfos  $companyinfos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companyinfos $companyinfos)
    {
        //
    }
}
