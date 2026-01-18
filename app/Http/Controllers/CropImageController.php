<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CropImageController extends Controller
{
    //

    public function index()
    {
        return view('croppie');
    }

    public function uploadCropImage(Request $request)
    {
        $image = $request->image;
        $request->full_image;
        dd($request);
        $username = app('current_user')->username;
        $mid = app('current_user')->membership_id;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= $username.'_'.$mid.'.png';
        $path = public_path('upload/profile/thumb/'.$image_name);
        $full_path = public_path('upload/profile/big');

        $user = User::where('username', $username)->first();

        $user->image = $image_name;
        $user->save();

        $full_image->move($full_path, $image_name);

        file_put_contents($path, $image);
        return response()->json(['status'=>true]);
    }
}
