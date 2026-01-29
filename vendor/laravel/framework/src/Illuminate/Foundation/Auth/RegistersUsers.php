<?php

namespace Illuminate\Foundation\Auth;

use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserRewardController;
use App\Matrix;
use App\Notifications\NewMemberRegistration;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use App\investment;
use App\user_reward;
use Illuminate\Database\Eloquent;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $banks = DB::table('banks')->get();
        return view('auth.register', compact('banks'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();
//        dd($request);
//        checking pin validity
//        $pin_validity = $this->checkPin($request->pincode, $request->serial, $request->package_id);
//
//        if ($pin_validity != true)
//        {
//            return redirect()->back()->with('fail', 'The PIN is INVALID -  Check Package' );
//        }


        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $package = Package::where('id', $user->package_id)->first();
        $this->setPinToUsed($user);
//        $this->credit_pv($user);
        $this->create_reward($user, $package);
//        $this->credit_sponsor_for_referral($user->sponsor);
        $this->create_matrix($user);

        if ($user->sponsor != "root") {
            $this->credit_sponsor_for_referral($user->sponsor, $package);
        }

        if ($user->parent != "root") {
            $this->update_parent_matrix($user);
        }

        $user_details = $this->get_user($user->username);

        $this->notify_user($user_details);
        $this->notify_sponsor($user_details);
        $this->notify_admin($user_details);

//        $this->update_sponsor_stage($user);
        return;
    }


    public function notify_user(\App\User $user)
    {
        $intro = "Welcome! you have been successfully registered";
        $subject = "Registered Successfully";
        $outro = "You will always use your username and (secret) password to access your account. Here, you will have access to see your profile, accounts, orders, transactions, savings etc.";
        $actionText = "View Profile";
        $actionUrl = route('my_profile');
        $notifications_controller = new NotificationsController();

        $notifications_controller->notify_user($user, $intro, $outro, $subject, $actionText, $actionUrl);

        return;
    }

    public function notify_sponsor(\App\User $user)
    {
        $sponsor = \App\User::where('username', $user->sponsor)->first();
        $intro = $user->username . " has been successfully registered under you.";
        $subject = "Congratulations! You Just Sponsored " . $user->username;
        $outro = "You have earned " . config('app.feeder_sdb') . " and has been credited into your balance";
        $actionText = "Check Balance";
        $actionUrl = route('dashboard');
        $notifications_controller = new NotificationsController();

        $notifications_controller->notify_user($sponsor, $intro, $outro, $subject, $actionText, $actionUrl);

        return;
    }

    public function notify_admin(\App\User $user)
    {
        $admin = \App\User::where('username', 'root')->first();
        $intro = $user->username . " Just registered  under . $user->sponsor";
        $subject = "New Member registration";
        $outro = $user->sponsor . " has earned " . config('app.feeder_sdb') . " and has been credited into his balance";
        $actionText = "View Profile";
        $actionUrl = route('member_details', $user->username);
        $notifications_controller = new NotificationsController();
        $notifications_controller->notify_user($admin, $intro, $outro, $subject, $actionText, $actionUrl);

        return;
    }

//    Setting PIN to Used State

    public function setPinToUsed($user)
    {
        $used_pin = $user->membership_id;

        DB::table('pins')
            ->where('serial', $used_pin)
            ->update([
                'status' => 5,
                'used_by' => $user->username,
                'used_date' => Carbon::now()

            ]);
        return;
    }


//    Creating starter reward packs
    public function create_reward($user, $package)
    {

        $starter = new user_reward([
            'membership_id' => $user->membership_id,
            'shopping' => 0,
            'cash' => 0,
            'points' => $package->pv,
        ]);

//        dd($starter);
        $starter->save();
//
//        $transaction = new TransactionController();
//
//        $transaction->log_transaction('CREDIT', 0.00, 'REGISTRATION_POINTS_REWARD', $user->username);
        return;
    }

//    Credit SPONSOR
    public function credit_sponsor_for_referral($username, Package $package)
    {

        $bonus = $package->amount * 0.30;
        $sponsor_username = $username;
        if ($sponsor_username != "root") {

//        $confirm = $this->check_if_its_extra_referral($sponsor_username);

            $user_to_credit = User::where('username', $sponsor_username)->first();
            $credit = user_reward::where('membership_id', $user_to_credit->membership_id)
                ->first();
            if ($credit != null) {
                $credit->cash += $bonus;
                $credit->save();

//log
                $transaction = new TransactionController();

                $transaction->log_transaction('CREDIT', $bonus, strtoupper($package->name) .'_REFERALS_BONUS', $sponsor_username);//


//            TODO
//            Notify Sponsor, sponsor's sponsor, notify registrant; - sms, messages, push, alerts etc.
//                $sponsors_sponsor = $user_to_credit->sponsor;
//
//                return $sponsors_sponsor;

            }
        }
        return;
    }


//    CREATING MATRIX

    public function create_matrix($user)
    {
        $matrix_controller = new MatrixController();
        $matrix_controller->create_matrix($user->username);
        return;
    }

    public function get_user($username)
    {
        $user = \App\User::where('username', $username)->first();

        return $user;
    }


//CREDITING PVS
    public function credit_points($sponsor_username)
    {
        $sponsor_details = User::where('username', $sponsor_username)->first();

//        $investment = new Investment([
//            'membership_id' => $sponsor_details->membership_id,
//            'paid_from' => "EXTRA_REFERRAL_POINTS",
//            'amount' => 2,
//            'due_date' => "Loading..."
//        ]);
//
//        $investment->save();

        $credit = user_reward::where('membership_id', $sponsor_details->membership_id)
            ->first();

        $credit->points += 1;

        $credit->save();

        $transaction = new TransactionController();

        $transaction->log_transaction('CREDIT', 1.00, 'EXTRA_REFERAL_POINT_REWARD', $sponsor_username);


        return;

    }


//ADDING NEW MEMBER TO SPONSOR'S MATRIX.
    public function update_parent_matrix($user)
    {
        $parent_matrix = Matrix::where('username', $user->parent)->first();
        $parent = User::where('username', $user->parent)->first();
        $position = $user->position;
//        dd($parent_matrix);

        if ($position == 0) {
//            check if the left_index (p1) of the sponsor is empty
//            and insert new user's username.
            if ($parent_matrix->p1 == null) {
                $parent_matrix->p1 = $user->username;
                $parent_matrix->save();

                //$this->update_sponsor_stage($user->sponsor, 0, 1);
                $this->update_parent_index($parent, $user->username, $position);
                $user->parent = $parent->username;
                $user->save();
            }
        } elseif ($position == 1) {
            if ($parent_matrix->p2 == null) {
                $parent_matrix->p2 = $user->username;
                $parent->save();
                //$this->update_sponsor_stage($user->sponsor, 0, 1);
                $this->update_parent_index($parent, $user->username, $position);
                $user->parent = $parent->username;
                $user->save();
            }

        }


    }

    protected function update_parent_index(User $parent, $username, $index)
    {
        if ($index == 0) {
            $parent->left_index = $username;
            $parent->save();

            return;
        } elseif ($index == 1) {
            $parent->right_index = $username;
            $parent->save();

            return;
        }

    }


    public function check_available_parent(array $parents, User $user)
    {
        $another_gen = [];
        $parents_arr = [];

//        dd($parents);

        if (count($parents) > 1) {
            foreach ($parents as $parent) {
                $parent_details = User::where('username', $parent)->first();
//            dd($parent_details);
                if ($parent_details->left_index == null) {
                    $parent_details->left_index = $user->username;
                    $parent_details->save();
                    array_push($parents_arr, $parent_details);
                    break;
//                return $parents_arr;
                } elseif ($parent_details->right_index == null) {
                    $parent_details->right_index = $user->username;
                    $parent_details->save();
                    array_push($parents_arr, $parent_details);
                    break;

                } else {
//            dd($parent_details);

                    array_push($another_gen, $parent_details->left_index, $parent_details->right_index);

                    continue;
//                return $another_gen;
                }
                $this->check_available_parent($another_gen, $user);
            }
        } else {
            return $parents;
        }

        return $parents_arr;
//
    }


    public function checkPin($pin, $serial, $package_id)
    {
        $mid = $this->exists_in_db($pin, $serial, $package_id);

        if (!$mid) {
            return false;
        } else {
            return true;
        }
    }


}
