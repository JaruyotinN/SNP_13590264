<?php

namespace App\Http\Controllers;

use App\StudentPost;
use Illuminate\Http\Request;

class StudentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentpost = StudentPost::get();
        foreach($studentpost as $stu){
            $stu->post;
        }
        return $studentpost;
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
        $post = StudentPost::create($request->all());
       
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentPost  $studentPost
     * @return \Illuminate\Http\Response
     */
    public function show(StudentPost $studentPost)
    {
        // $studentPost->staffs;
        // return $studentPost;
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
