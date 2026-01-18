<?php

namespace App\Http\Controllers\Admin;

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
        $username = app('current_user')->username;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= $username.'_'.time().'.png';
        $path = public_path('upload/profile/thumb/'.$image_name);


        $user = User::where('username', $username)->first();

        $user->image = $image_name;
        $user->save();

        file_put_contents($path, $image);
        return response()->json(['status'=>true]);
    }
}
