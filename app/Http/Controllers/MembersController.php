<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Members;
use App\Member;
use App\Profile;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Countries\Package\Countries;


class MembersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['members', 'auth'], ['except' => ['checkSponsorship', 'checkUsernameAvailability', 'check_parent']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::where('is_admin', 0)->get();

        return view('members.index', compact('members'));
    }

    public function allMembers()
    {
        if (app('current_user')->is_admin != 1) {
            return redirect()->route('dashboard');
        }
        $members = User::where('is_admin', 0)->latest()->get();

        return view('admin.members.index', compact('members'));
    }

    public function members_only()
    {
        $members = User::where('is_admin', 0)->get();

        return $members;
    }

    public function check_parent(Request $request)
    {
        $id = $request->refId;
        $memberDetails = User::where('username', $id)->first();
        if ($memberDetails == null) {
            return response()->json(['validity' => 'invalid']);
        } else {


            $left = $memberDetails->left_index;
            $right = $memberDetails->right_index;

            if ($left == null) {
                $position = 0;
            } elseif ($right == null) {
                $position = 1;
            }else{
                $position = 2;
            }
            $data = [
                'validity' => 'valid',
                'firstname' => $memberDetails->firstname,
                'lastname' => $memberDetails->lastname,
                'position' => $position,
            ];

            return response()->json($data);
        }


    }

    public function checkSponsorship(Request $request)
    {
        $id = $request->refId;
        $memberDetails = User::where('username', $id)->first();
        if ($memberDetails == null) {
            return response()->json(['validity' => 'invalid']);
        } else {


            $data = [
                'validity' => 'valid',
                'firstname' => $memberDetails->firstname,
                'lastname' => $memberDetails->lastname,
            ];

            return response()->json($data);
        }


    }

    public function checkUsernameAvailability(Request $request)
    {
        $username = $request->username;
        $memberDetails = User::where('username', $username)->count();
        if ($memberDetails > 0) {
            return response()->json(['availability' => 'unavailable']);
        } else {
            return response()->json(['availability' => 'available']);
        }

    }

    public function my_profile(Request $request)
    {
        $user = app('current_user');
        if ($user != null) {
            $rewards = DB::table('user_rewards')
                ->where('membership_id', auth()->user()->membership_id)
                ->first();

            $countries = new Countries();
            $states = $countries->where('name.common', 'Nigeria')->first()
                ->hydrateStates()->states
                ->pluck('name', 'postal')->toArray();
            $profile = Profile::where('user_id', $user->id)->first();

            if (!$profile)
            {
                $profile_c = new ProfileController();
                $profile = $profile_c->member_create_profile();
            }



            $data['page_title'] = 'profile';
            return view('members.profile', compact('rewards','profile', 'user', 'data', 'states'));

        } else {
            return redirect('/login');
        }

    }

    public function update_profile_pix(Request $request)
    {
//        dd($request);
        $request->validate(
            [
                'profile_pix' => 'required'
            ]
        );
        if ($request->hasFile('profile_pix')) {

            $file = $request->file('image');
            $img = Image::make($file->getRealPath());
            $width = $img->width();
            $height = $img->height();

            $destinationPath = 'assets/img/profile';
            $filename = app('current_user')->username . '_';
            $thumbPath = 'assets/img/profile/productThumbImage/' . $filename;
            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);

            return redirect()->back()->with('success', 'The Profile Pix has been updated successfully');

        }
    }


//    SAVE PROFILE UPDATE -  POST

    public function update_profile(Request $request, $username)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string'],
            'address' => ['string', 'max:500'],
            'email' => ['string', 'email', 'max:255'],
        ]);
//        dd($request);
//        $this->validator($request->all())->validate();
        $current_user = auth()->user();
//        dd($current_user);
        if (app('current_user') != null) {
            $my_profile = User::where('membership_id', auth()->user()->membership_id)
                ->update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'address' => $request->address2,
                    'lga' => $request->lga,
                    'state' => $request->state,
                    'state' => $request->state,
                    'city' => $request->city, ablegod#
                ]);

            if ($my_profile) {
                return redirect()->back()->with('success', 'Updated Successfully');
            } else {
                return redirect()->back()->with('failed', 'Failed to Update Profile, check and try again');
            }

        } else {
            return redirect('/login');
        }

    }

//    SAVE USER BANK DETAILS

    public function member_update_bank(Request $request)
    {
        $request->validate([
            'bank_id' => ['required', 'string'],
            'bankaccountnumber' => ['string', 'required', 'string', 'max:10'],
        ]);
//        $this->validator($request->all())->validate();
        $current_user = auth()->user();
//        dd($current_user);
        if (app('current_user') != null) {
            $my_profile = User::where('membership_id', auth()->user()->membership_id)
                ->update([
                    'bank_id' => $request->bank_id,
//                    'bank_account_name' => $request->bankaccountname,
                    'bank_account_number' => $request->bankaccountnumber,
                    'bank_edited' => 1
                ]);

//            dd($my_profile);

            if ($my_profile) {
                return redirect()->back()->with('success', 'Updated Successfully');
            } else {
                return redirect()->back()->with('failed', 'Failed to Update Profile, check and try again');
            }

        } else {
            return redirect('/login');
        }

    }

    public function update_user_profile(Request $request, $username)
    {
//        dd($request->password);
        $this->validator($request->all())->validate();

//        dd($current_user);
        if (auth()->user() != null) {
            $my_profile = User::where('username', $username)
                ->update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'bank_id' => $request->bank_id,
                    'bank_account_name' => $request->bankaccountname,
                    'bank_account_name' => $request->bankaccountname,
                    'bank_account_number' => $request->bankaccountnumber,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]);

            return redirect()->back()->with('success', 'Updated Successfully');
        } else {
            return redirect('/login');
        }

    }


    public function member_edit_address(Request $request)
    {
//        dd($request->password);
        $this->validator($request->all())->validate();



//        dd($current_user);
        if (auth()->user() != null) {
            $user = app('current_user');
            $profile = new Profile([
                    'address' => $request->address,
                    'address2' => $request->address2,
                    'state' => $request->state,
                    'city' => $request->city,
                    'country' => $request->country,
                    'dob' => $request->dob,
                    'nok' => $request->nok,
                    'nok_phone' => $request->nok_phone,
                    'id_type' => $request->id_type,
                    'id_number' => $request->id_number,
                    'status' => 1,
                ]);

            return redirect()->back()->with('success', 'Updated Successfully');
        } else {
            return redirect('/login');
        }

    }

    public function change_password($username)
    {

        return view('admin.members.changePassword')->with('username', $username);
    }

    public function member_change_password()
    {
        $username = app('current_user')->username;
        return view('members.changepassword')->with('username', $username);
    }

    public function update_user_password(Request $request)
    {
//        dd($request->password);
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

//
        $my_profile = User::where('username', $request->username)
            ->update([
                'password' => Hash::make($request->password),
            ]);

        return redirect()->back()->with('success', 'Password Updated Successfully to: ' . $request->password);


    }

    public function update_member_password(Request $request)
    {
//        dd($request->password);
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

//
        $my_profile = User::where('username', app('current_user')->username)
            ->update([
                'password' => Hash::make($request->password),
            ]);

        return redirect()->back()->with('success', 'Password Updated Successfully to: ' . $request->password);


    }

    public function user_downline_tree($username)
    {
//        create an array
//        $downlines = array();
        $first_downlines = User::where('sponsor', $username)->get();
//        dd($first_downlines);
//        $all = array_push($downlines, $first_downlines);
        if ($first_downlines != null) {
//            dd($first_downlines);
//            in the event of the masters not responding, let there be a case for the two reffered people that joined you
            return view('genealogy.downlinetree', compact('first_downlines', 'username'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function member_details($username)
    {
        $member = User::where('username', $username)->first();

        $rewards = DB::table('user_rewards')
            ->where('membership_id', $member->membership_id)
            ->first();

        $investment = DB::table('investments')
            ->where('membership_id', $member->membership_id)
            ->get();
        $summed_investment_amount = $investment->sum('amount');
        $summed_interest_on_investment = $investment->sum('interest');
//        dd($rewards, $investment);
        return view('admin.members.details', compact('member', 'rewards', 'investment', 'summed_investment_amount', 'summed_interest_on_investment'));


    }


    public function member_referrals()
    {
        $user = app('current_user');
        $referrals = User::where('sponsor', $user->username)->get();

        return view('members.referrals', compact('referrals'));

    }



    protected function validator(array $data)
    {

        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'bank_id' => ['required', 'integer'],
            'bankaccountnumber' => ['required', 'string'],
            'bankaccountname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string'],
            'address' => ['required', 'string', 'max:500'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }



}
