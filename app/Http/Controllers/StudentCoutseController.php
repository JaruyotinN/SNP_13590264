<?php

namespace App\Http\Controllers;

use App\StudentCoutse;
use Illuminate\Http\Request;

class StudentCoutseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = StudentCoutse::get();
        foreach($courses as $course){
            $course->majors;
        }
        return $courses;

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
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function show(StudentCoutse $studentCoutse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentCoutse $studentCoutse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentCoutse $studentCoutse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentCoutse  $studentCoutse
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentCoutse $studentCoutse)
    {
        //
    }
}
