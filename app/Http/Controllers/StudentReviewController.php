<?php

namespace App\Http\Controllers;

use App\ComeventJoin;
use App\studentReview;
use Illuminate\Http\Request;

class StudentReviewController extends Controller
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
        $review = studentReview::create($request->all());
        $id = $review->id;

        $comjoinid = $request->comevent_joins_id;
        $comeventJoin = ComeventJoin::find($comjoinid);      
      
        $comeventJoin->update([
            'sturev01_id' => $id
        ]);
        return $review;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\studentReview  $studentReview
     * @return \Illuminate\Http\Response
     */
    public function show(studentReview $studentReview)
    {
        //
    }

    public function showdetailreview(studentReview $studentReview ,$id )
    {
        $studentReview = studentReview::find($id);
        $studentReview->student;
        $studentReview->comeventjoin;
        return $studentReview;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\studentReview  $studentReview
     * @return \Illuminate\Http\Response
     */
    public function edit(studentReview $studentReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studentReview  $studentReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentReview $studentReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\studentReview  $studentReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentReview $studentReview)
    {
        //
    }
}