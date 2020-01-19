<?php

namespace App\Http\Controllers;

use App\Beat;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $set = '/uploads/images/' . $request->path . '/' . $imageName;
        $request->image->move(public_path('uploads/images/' . $request->path), $imageName);
        return $set;
    }
    public function uploadFile(Request $request)
    {
        $file = $request->file;
        $filename = time() . $file->getClientOriginalName();
        $path = '/uploads/files';
        $file->move(public_path($path), $filename);
        $set = '/uploads/files/' . $filename;
        return $set;
    }
}