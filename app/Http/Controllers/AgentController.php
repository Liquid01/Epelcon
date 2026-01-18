<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Package;
use App\Pin;
use App\user_reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return redirect()->back()->with('success', 'Updating PINs, Please check back');

        return view('office.index');
    }

    public function my_pins()
    {
//        return redirect()->back()->with('success', 'Updating PINs, Please check back');

        $username = app('current_user')->username;
        $pins = Pin::where('created_by', $username)->where('status', 0)->get()->take(20);
//        dd($pins);
        $data = ['used'=>0];

        return view('stockists.pins.index', compact('pins', 'data'));
    }

    public function my_used_pins()
    {


        $username = app('current_user')->username;
        $pins = Pin::where('created_by', $username)->where('status', 5)->latest()->paginate(20);
$data = ['used'=>1];
        return view('stockists.pins.index', compact('pins', 'data'));
    }

    public function new_pin()
    {
//        return redirect()->back()->with('success', 'Updating PINs, Please check back');
        $packages = Package::all();

        return view('stockists.pins.create', compact('packages'));
    }

//
//    public function generatepin()
//    {
//        return view('admin.pins.create');
//    }


    public function postGeneratePin(Request $request)
    {
//        return redirect()->back()->with('success', 'Updating PINs, Please check back');
        $quantity = $request->quantity;
        $for = str_replace(' ', '-', $request->for);
        $batch = $for .'-'.$quantity;
        $package_id = $request->package_id;
        $package = Package::where('id', $package_id)->first();

        if (!$package)
        {
            return redirect()->back()->with('fail', 'WRONG PACKAGE SELECTED');
        }
        $amount = $quantity * $package->amount;

        $wallet_balance = app('current_user')->rewards;

        if ($wallet_balance->stockist < $amount && $wallet_balance->cash < $amount)
        {
            return redirect()->back()->with('fail', 'Insufficient Balance: Fund Wallet and Try again');
        }

//            dd(str_replace(' ', '-', $batch));
        $batch = str_replace(' ', '-', $batch).'-'.time();

        for ($j = 0; $j < $quantity; $j++) {

            $string = $this->random_str(10);

            if ($this->exists_in_db($string)) {
                # code...
//                $string = $this->generatepin();
                continue;
            }

            $this->savekey($string, $this->getserial($package_id), $batch, $package_id);
        }

        if ($wallet_balance->stockist >= $amount)
        {
            $wallet_balance->stockist -= $amount;
        }else{
            $wallet_balance->cash -= $amount;
        }

        $wallet_balance->save();

        $tc = new TransactionController();
        $tc->log_transaction('DEBIT', $amount, 'PIN_PURCHASE', app('current_user')->username);


        return redirect()->back()->with('success', $quantity . ' Pins Generated Successfuly');
    }


    public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }

        return mb_strtoupper($str, 'UTF-8');
    }


    public function savekey($string, $serial, $batch, $package_id)
    {
        $created_by = app('current_user');
        DB::table('pins')->insert(['batch' => $batch, 'package_id' => $package_id, 'code' => $string, 'serial' => $serial, 'status' => 0, 'created_by' => $created_by->username]);

    }

    public function getlastid()
    {
        $lastid = DB::select('SELECT max(id) AS maxID FROM pins');

        foreach ($lastid as $key => $v) {
            $lastid = $v->maxID;
        }
        if ($lastid == null) {
            return 1;
        } else {
            return $lastid + 1;
        }

    }

    public function getthememberid()
    {
        $serial = $this->getserial();
        return $serial;
    }

    public function getserial($package_id)
    {
        $lastid = $this->getlastid();

        switch ($package_id)
        {
            case 1:
                $string = "TE-MSC";
                break;
            case 2:
                $string = "SU-MSC";
                break;
            case 3:
                $string = "EM-MSC";
                break;
            case 4:
                $string = "AC-MSC";
                break;
            case 5:
                $string = "EG-MSC";
                break;
            case 6:
                $string = "DE-MSC";
                break;
            default:
                $string = 'MSC';
        }


        //$countstring=strlen($lastid);
        $number = 4555;
        $number += $lastid;
        $countstring1 = strlen($number);

        if ($countstring1 == 4)
        {
            $string .= $this->random_str(4) . $number;
        } elseif ($countstring1 == 6) {
            $string .= $this->random_str(3) . $number;
        } elseif ($countstring1 == 7) {
            $string .= $this->random_str(2) . $number;
        } else {
            $string .= $number;
        }


        return $string;
    }


    public function exists_in_db($pin)
    {

        $pincount = DB::table('pins')->where('code', '=', $pin)->count();
        if ($pincount > 0) {
            return true;
        } else {
            return false;
        }

    }

    //generate random key
    public function generateKey($length)
    {
        /// Random characters
        $characters = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");

        // set the array
        $keys = array();

        // loop to generate random keys and assign to an array
        while (count($keys) < $length) {
            $x = mt_rand(0, count($characters) - 1);
            if (!in_array($x, $keys))
                $keys[] = $x;
        }

        // extract each key from array
        $random_chars = '';
        foreach ($keys as $key)
            $random_chars .= $characters[$key];

        // display random key
        return $random_chars;
    }

    public function print_pin()
    {
        $pins = Pin::all();
//        dd($pins);

        return view('admin.pins.print', compact('pins'));
    }

    public function sell_pin()
    {

        $pins = Pin::all();
//        dd($pins);

        return view('admin.pins.print', compact('pins'));
    }



}
