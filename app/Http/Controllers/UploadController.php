<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $imageName = time().'_'.$request->image->getClientOriginalName();
        $set = '/uploads/images/' . $request->path . '/' . $imageName;
        $request->image->move(public_path('uploads/images/' . $request->path), $imageName);
        return $set;
    }
    public function uploadFile(Request $request)
    {
        $file = $request->file;
        $filename = time() . $file->getClientOriginalName();
        $path = '/uploads/files/Portfolio';
        $file->move(public_path($path), $filename);
        $set = '/uploads/files/Portfolio/' . $filename;
        return $set;
    }
    public function uploadCv(Request $request)
    {
        $file = $request->file;
        $filename = time() . $file->getClientOriginalName();
        $path = '/uploads/files/Resume';
        $file->move(public_path($path), $filename);
        $set = '/uploads/files/Resume/' . $filename;
        return $set;
    }
    public function uploadTranscript(Request $request)
    {
        $file = $request->file;
        $filename = time() . $file->getClientOriginalName();
        $path = '/uploads/files/Transcript';
        $file->move(public_path($path), $filename);
        $set = '/uploads/files/Transcript/' . $filename;
        return $set;
    }
    
}