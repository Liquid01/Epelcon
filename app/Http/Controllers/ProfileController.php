<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function member_create_profile()
    {
        $user = app('current_user');

            $profile = new Profile([
                'user_id' => $user->id,
                'address' => "",
                'address2' =>"",
                'country' => "Nigeria",
                'state' => "",
                'city' => "",
                'nok' => "",
                'nok_phone' => "",
                'dob' => "",
                'id_type' => "",
                'id_number' => "",
                'validated' => 0,
                'status' => 0,
            ]);

            $profile->save();

            return $profile;
        }

        public  function update_profile_others(Request $request)
        {
            $user = app('current_user');
            $profile = Profile::where('user_id', $user->id)->first();

            if ($profile)
            {
                $profile = $profile->update([
                    'user_id' => $user->id,
                    'address' => $request->address,
                    'address2' => $request->address2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'nok' => $request->nok,
                    'nok_phone' => $request->nok_phone,
                    'dob' => $request->dob,
                    'id_type' => $request->id_type,
                    'id_number' => $request->id_number,
                    'validated' => 0,
                    'status' => 1,
                ]);

                return redirect()->back()->with('success', 'profile updated successfully');
            }
        }

}
