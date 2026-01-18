<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UpgradeController;
use App\Package;
use App\User;
use App\user_reward;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $packages = Package::all();

       return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }


    public function change_package(User $user)
    {
        $package = $user->package;
//        dd($package);
        $packages = Package::where('id', '!=', $package->id)
            ->where('amount', '>', $package->amount)->get();

        return view('admin.packages.change', compact('user', 'packages'));
    }

    public function upgrade_package(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'new_package' => 'required|integer|exists:packages,id'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user)
        {

            $user_rewards = user_reward::where('membership_id', $user->membership_id)->first();
//            $stockist = app('current_user');
//            $stockist_reward = user_reward::where('membership_id', $stockist->membership_id)->first();

            $old_package = Package::where('id', $user->package_id)->first();
            $old_points = $old_package->pv;
            $old_bonus = $old_package->referral_bonus;

            $new_package = Package::where('id', $request->new_package)->first();
            $new_points = $new_package->pv;
            $new_bonus = $new_package->referral_bonus;

            $pv_difference = $new_points - $old_points;
            $bonus_diff = $new_bonus - $old_bonus;
            $package_diff = $new_package->amount - $old_package->amount;

//            echo 'STOCKIST BAL:'. $stockist_reward->cash;
//            echo 'OLD PACKAGE BONUS: '.$old_package->amount.' B: '. $old_bonus . '<br>';
//            echo 'NEW PACKAGE BONUS: '.$new_package->amount .' B:'. $new_bonus . '<br>';
//            echo 'OLD PV: '. $old_points . '<br>';
//            echo 'NEW PV: '. $new_points . '<br>';
//
//
//            echo 'BONUS BAL: '. $bonus_diff . '<br>';
//            echo 'PV BAL: '. $pv_difference . '<br>';

//            dd($old_bonus);

            if ($user->package_id >= (int)$request->new_package)
            {
//                dd($user->package_id, (int)$request->new_package);
                return redirect()->back()->with('fail', 'Select a package higher than the current Package');
            }

//            dd($user->package_id);

//            echo 'USER OLD POINTS: ' .$user->rewards->points.'<br>';

                $user->package_id = $request->new_package;
                $user->save();


                $user_rewards->points += $pv_difference;
                $user_rewards->save();

//            echo 'STOCKIST NEW BAL: '.$stockist_reward->cash .'<br>';
                $credit = $this->credit_sponsor($user, $bonus_diff, $old_package->name);

                $uc = new UpgradeController();
                $uc->log_upgrade($user, $old_package->id, $new_package->id);

//            echo 'USER NEW POINTS: ' .$user->rewards->points.'<br>';


//                TODO NOTIFY ALL


                return redirect()
                    ->back()
                    ->with('success', $user->username.
                        ' Upgraded from '. $old_package->name.
                        ' to'. $new_package->name. ' Successfully');




        }


    }

    //credit upgrade

    public function credit_sponsor(User $user, $bonus, $old_package)
    {
//dd($bonus);
//        $sponsor = $user->sponsor;
        $sponsor_details = User::where('username', $user->sponsor)->first();
        $user_rewards = user_reward::where('membership_id', $sponsor_details->membership_id)->first();

//        echo 'SPONSOR OLD BALANCE: ' .$user_rewards->cash.'<br>';

        $user_rewards->cash = $user_rewards->cash + $bonus;
        $user_rewards->save();
//        dd($user_rewards);
//        echo 'USER NEW BLANCE: ' .$user_rewards->cash.'<br>';

        $transaction = new TransactionController();

        $transaction->log_transaction('CREDIT', $bonus, 'PACKAGE_UPGRADE', $sponsor_details->username,
            ['upgraded'=> $user->username,
                'from' => $old_package,
                'to' => $user->package->name
            ]);

        return true;

    }

//    public function upgrade_package(Request $request, User $user)
//    {
//        $request->validate([
//            'new_package' => 'required|string'
//        ]);
//        $package_id = $request->new_package;
//
//        $old_package = Package::where('id', $user->package_id)->first();
//        $old_points = $old_package->pv;
//        $old_bonus = $old_package->referral_bonus;
//
//        $new_package = Package::where('id', $package_id)->first();
//        $new_points = $new_package->pv;
//        $new_bonus = $new_package->referral_bonus;
//
//        $user->package_id = $package_id;
//
//        $user_reward = user_reward::where('membership_id', $user->membership_id)->first();
////        $points = $user_reward->points;
//
//        $pv_difference = $new_points - $old_points;
//        $bonus_diff = $new_bonus - $old_bonus;
//
//
//        $user->save();
//
//        $user_reward->points += $pv_difference;
//
//        $user_reward->save();
//
//        $credit = $this->credit_sponsor($user, $bonus_diff);
//
//        return redirect()->back()->with('success', 'Package Upgraded to '. strtoupper($new_package->name) . ' Successfully');
//    }
//
//    //credit upgrade
//
//    public function credit_sponsor(User $user, $bonus)
//    {
////        $sponsor = $user->sponsor;
//        $sponsor_details = User::where('username', $user->sponsor)->first();
//        $user_rewards = user_reward::where('membership_id', $sponsor_details->membership_id)->first();
//
//        $user_rewards->cash += $bonus;
//
//        $user_rewards->save();
//
//        return true;
//
//    }

}//controller ends
