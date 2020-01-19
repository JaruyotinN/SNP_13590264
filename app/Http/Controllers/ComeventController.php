<?php

namespace App\Http\Controllers;

use App\Comevent;
use Illuminate\Http\Request;

class ComeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comevents = Comevent::get();
        foreach($comevents as $com){
            // $com->staff->company;
            $com->company;
            foreach($com->staffs as $staff){
                // $staff->company;
            }
            // $com->company;
        }
        return $comevents;
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
    // public function store(Request $request)
    // {

    //     $item = Item::create($request->all());
    //     $soundLang = SoundLang::create([
    //         "model" =>  "App\Item",
    //         "relation_id" => $item->id,
    //         "lang_id" => 1,
    //         "file_url" => $request->file_url
    //     ]);
    //     return $item;
    // }
    //test

    // public function uploadImage(Request $request)
    // {
    //     $imageName = time() . '.' . $request->image->getClientOriginalExtension();
    //     $set = '/uploads/images/' . $request->path . '/' . $imageName;
    //     $request->image->move(public_path('uploads/images/' . $request->path), $imageName);
    //     return $set;
    // }
    // public function uploadFile(Request $request)
    // {
    //     $file = $request->file;
    //     $filename = time() . $file->getClientOriginalName();
    //     $path = '/uploads/files';
    //     $file->move(public_path($path), $filename);
    //     $set = '/uploads/files/' . $filename;
    //     return $set;
    // }
    //test
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
