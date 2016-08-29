<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\Contracts\ImageInterface;
use Auth;

class ImagesController extends Controller
{
    public function postUploadImage(ImageRequest $request,ImageInterface $imageRepo)
    {
        $logoFile = $request->file('image')->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/Uploads/images';
        $result = $request->file('image')->move($path, $name.'.'.$logoFile);
        $data = [
           'image' => $name.'.'.$logoFile,
           'user_id' => Auth::user()->id,
        ];
        $result = $imageRepo->postCreateImage($data);
        return redirect()->back(); 
    }
}
