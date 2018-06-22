<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageModel;
use Image;

class ImageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = ImageModel::latest()->first();
        return view('createimage', compact('image'));/*
        $image_models=Image::with('$image_models')->get();
        return view('image_models.createimage')->with('image_model',$image_models);*/
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);
        

/*
        $thumbnailImage = Image::make($originalImage);
*/
        $filenamewithext= $request->file('filename')->getClientOriginalName();
        $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);
        $extension=$request->file('filename')->getClientOriginalExtension();
        $filenametostore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('filename')->storeAs('public/originalPath',$filenametostore);
       /* $originalImage->resize(150,150);
        $file=$originalImage->getClientOriginalName();
        $originalImage->storeAs('public/originalPath',$file);*/
        
    

        $imagemodel= new ImageModel();
        $imagemodel->filename=$filenametostore;
        $imagemodel->save();

                

        return back()->with('success', 'Your images has been successfully Upload');

    }

}