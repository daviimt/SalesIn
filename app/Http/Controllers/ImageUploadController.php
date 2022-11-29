<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
        $file = $request -> file('image');
 
        $name = $file->getClientOriginalName();
 
        // $path = $request->$file->store('public/images');
 
        \Storage::disk("image")->put($name, \File::get($file));
 
        // $save = new Photo;
 
        // $save->name = $name;
        // $save->path = $path;
 
        // $save->save();
 
      return  back()->with('status', 'Image Has been uploaded')->with('image',$name);
 
    } 
}
