<?php

namespace App\Http\Controllers;

use App\CompanyStaff;
use Illuminate\Http\Request;

class CompanyStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $comevent = CompanyStaff::create($request->all());

        return $comevent;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyStaff  $companyStaff
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyStaff $companyStaff)
    {
        //
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
    public function update(Request $request, CompanyStaff $companyStaff)
    {
        //
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
