<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Str;

//use Ramsey\Uuid\Uuid;

class SubscriptionController extends Controller
{

    function __construct()
    {
        return $this->middleware(['auth', 'members']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function member_subscriptions()
    {
        $member_subscriptions = Subscription::where('by', app('current_user')->username)->get();

        return view('subscriptions.index', compact('member_subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function airtime_top_up()
    {
        return view('subscriptions.airtime');
    }

    public function airtime_top_up_info(Request $request)
    {

        $request->validate([
            'msisdn' => 'required|max:13|min:13'
        ]);
        $msisdn = $request->msisdn;
//        dd($msisdn);
        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $diff_hours = $token->updated_at->diffInHours(now());

        $token_auth = json_decode($token);

        if ($diff_hours > 30) {
            $token = $this->reauth_token($token_auth);
        }else{
            $token_auth = json_decode($token)->token;
        }

        $raw_auth = "Authorization: Bearer ".$token_auth;

//        dd($raw_auth);

        $response = Curl::to('https://clients.primeairtime.com/api/topup/info/' . $msisdn)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->get();
//

        $data = json_decode($response);
//        dd($data);
        if (isset($data->opts)) {
            $opts = $data->opts;
            $products = $data->products;
            $product_id = ($products[0])->product_id;
            $msisdn = $opts->msisdn;

            return view('subscriptions.topup_info', compact('opts', 'products'));
        }

        return redirect()->back()->with('fail', 'Error Occurred or POOR NETWORK');
    }

    public function send_airtime(Request $request)
    {
        $membership_id = app('current_user')->membership_id;

        $account_controller = new AccountController();
        $member_balance = $account_controller->check_member_total_reward($membership_id);
        $topup_amount = $request->topup_amount;

        if ($topup_amount > 20000)
        {
            return redirect()->route('airtime_top_up')->with('fail', 'Amount cannot be more than N20,000');
        }
//        dd($member_balance);
        if ($member_balance < $topup_amount)
        {
            return redirect()->route('airtime_top_up')->with('fail', 'INSUFFICIENT BALANCE FOR TOPUP');
        }else{
            $deduct = $account_controller->debit_member($membership_id, $topup_amount - ($topup_amount*0.03));

            $transaction_controller = new TransactionController();
            $transaction_controller->log_transaction("DEBIT", $topup_amount, "Airtime Topup", app('current_user')->username);

            if ($deduct == false)
            {
                return redirect()->route('airtime_top_up')->with('fail', 'INSUFFICIENT BALANCE FOR TOPUP');
            }
        }

        $customer_reference = (string)Str::uuid();
        $product_id = $request->product_id;
        $msisdn = $request->msisdn;
        $customer_reference = (string)Str::uuid();
        $denomination = $request->topup_amount;
        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $d_data = ["product_id" => strval($product_id), "denomination" => strval($denomination), "send_sms" => false, "sms_text" => "", "customer_reference" => strval($customer_reference)];
        $data = json_encode($d_data);
        $raw_auth = "Authorization: Bearer ".$token->token;

//        dd($raw_auth);

        $response = Curl::to('https://clients.primeairtime.com/api/topup/exec/' . $msisdn)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->withData($data)
            ->post();

//        dd($response);

        $reply = json_decode($response);
//dd($reply);
        if (isset($reply->status) && $reply->status == '201') {
            $subscription = new Subscription([
                'by' => app('current_user')->username,
                'type' => 'AIRTIME_TOPUP',
                'product_id' => $product_id,
                'denomination' => $denomination,
                'message' => $reply->message,
                'reference' => $reply->reference,
                'topup_currency' => $reply->topup_currency,
                'target' => $reply->target,
                'time' => $reply->time,
                'country' => $reply->country,
                'operator_name' => $reply->operator_name,
                'customer_reference' => $customer_reference,
                'msisdn' => $reply->target,
                'paid_amount' => $reply->paid_amount,
                'topup_amount' => $reply->topup_amount,
                'code' => $reply->code,
                'status' => $reply->status
            ]);

            $subscription->save();

            return view('subscriptions.topup_result', compact('subscription'))->with('success', 'Your Recharge of ' . $denomination . ' to ' . $msisdn . 'was Successful');
        }

        return redirect()->route('airtime_top_up')->with('fail', 'topup was NOT SUCCESSFUL - ERROR: '. $reply->error->code);
    }


//    DATA TOP UP Page

    public function data_top_up()
    {
        return view('subscriptions.data');
    }

//    Data top up info
    public function data_top_up_info(Request $request)
    {

        $request->validate([
            'msisdn' => 'required|max:13|min:13'
        ]);
        $msisdn = $request->msisdn;
//        dd($msisdn);
        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $diff_hours = $token->updated_at->diffInHours(now());

        $token_auth = json_decode($token);

        if ($diff_hours > 30) {
            $token = $this->reauth_token($token_auth);
        }else{
            $token_auth = json_decode($token)->token;
        }

        $response = Curl::to('https://clients.primeairtime.com/api/datatopup/info/' . $msisdn)
            ->withContentType('application/json')
            ->withHeader('Authorization: Bearer ' . $token_auth)
            ->get();

        $data = json_decode($response);

//                dd($data);

        if (isset($data->opts)) {
            $opts = $data->opts;
            $products = $data->products;
//            $product_id = ($products[0])->product_id;
//            $msisdn = $opts->msisdn;

            return view('subscriptions.data_topup_info', compact('opts', 'products'));
        }

        return redirect()->back()->with('fail', 'Error Occurred or Data Incorrect');
    }


//    Send Data
    public function send_data(Request $request)
    {
        $topup_data = explode(',', $request->data_topup_amount);
        $dtopup_amount = $topup_data[0];
        $dproduct_id = $topup_data[1];
        $membership_id = app('current_user')->membership_id;

        $account_controller = new AccountController();
        $member_balance = $account_controller->check_member_total_reward($membership_id);
        $topup_amount = $dtopup_amount;

        if ($member_balance < $topup_amount)
        {
            return redirect()->route('data_top_up')->with('fail', 'INSUFFICIENT BALANCE FOR SUBSCRIPTION');
        }else{
            $deduct = $account_controller->debit_member($membership_id, $topup_amount);



            if ($deduct == false)
            {
                return redirect()->route('data_top_up')->with('fail', 'INSUFFICIENT BALANCE FOR SUBSCRIPTION');
            }

            $transaction_controller = new TransactionController();
            $transaction_controller->log_transaction("DEBIT", $topup_amount, "Airtime Topup", app('current_user')->username);
        }

        $product_id = $dproduct_id;

//        dd($product_id, $topup_amount);
        $msisdn = $request->msisdn;
        $customer_reference = (string)Str::uuid();
        $denomination = $topup_amount;
        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $d_data = ["product_id" => strval($product_id), "denomination" => strval($denomination), "send_sms" => false, "sms_text" => "", "customer_reference" => strval($customer_reference)];
        $data = json_encode($d_data);

        $raw_auth = "Authorization: Bearer ".$token->token;

        $response = Curl::to('https://clients.primeairtime.com/api/datatopup/exec/' . $msisdn)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->withData($data)
            ->post();

//        dd($response);

        $reply = json_decode($response);

        if ($reply->status == '201') {
            $subscription = new Subscription([
                'by' => app('current_user')->username,
                'type' => 'DATA_TOPUP',
                'product_id' => $product_id,
                'denomination' => $denomination,
                'message' => $reply->message,
                'reference' => $reply->reference,
                'topup_currency' => $reply->topup_currency,
                'target' => $reply->target,
                'time' => $reply->time,
                'country' => $reply->country,
                'operator_name' => $reply->operator_name,
                'customer_reference' => $customer_reference,
                'msisdn' => $reply->target,
                'paid_amount' => $reply->paid_amount,
                'topup_amount' => $reply->topup_amount,
                'code' => $reply->code,
                'status' => $reply->status
            ]);

            $subscription->save();

            return view('subscriptions.topup_result', compact('subscription'))->with('success', 'Your Data Subscription of ' . $denomination . ' to ' . $msisdn . 'was Successful');
        }

        return view('subscriptions.topup_result')->with('fail', 'Data Subscription was NOT SUCCESSFUL - ERROR');
    }

//    TV SUBSCRIPTION

    public function subscribe_tv()
    {
        return view('subscriptions.tv');
    }

    public function save_subscribe_tv()
    {
        return view('subscriptions.tv');
    }

//    ELECTRICITY TOUP

//?show form

    public function pay_light_bill()
    {
        return view('subscriptions.billpay');
    }

//Countries Bills
    public function bills_pay(Request $request)
    {

        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $diff_hours = $token->updated_at->diffInHours(now());

//        dd($diff_hours);

        $token_auth = json_decode($token);

        if ($diff_hours > 30) {
            $token = $this->reauth_token($token_auth);
        }else{
            $token_auth = json_decode($token)->token;
//            dd($token_auth);
        }

        $raw_auth = "Authorization: Bearer ".$token_auth;

//        dd($raw_auth);

        $response = Curl::to('https://clients.primeairtime.com/api/billpay')
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->get();
//

        $data = json_decode($response);
//        dd($data);
        if (isset($data)) {
            $countries  = $data->countries;
//dd($countries);

            return view('subscriptions.billpay', compact('countries'));
        }

        return redirect()->back()->with('fail', 'Error Occurred or POOR NETWORK');
    }

// Bills Services
    public function bills_services($iso)
    {

        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $diff_hours = $token->updated_at->diffInHours(now());

        $token_auth = json_decode($token);

        if ($diff_hours > 30) {
            $token = $this->reauth_token($token_auth);
        }else{
            $token_auth = json_decode($token)->token;
        }

        $raw_auth = "Authorization: Bearer ".$token_auth;

//        dd($raw_auth);

        $response = Curl::to('https://clients.primeairtime.com/api/billpay/country/'.$iso)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->get();
//

        $data = json_decode($response);
//        dd($data);
        if (isset($data)) {
            $services  = $data->services;
//dd($countries);

            return view('subscriptions.billpay', compact('services', 'iso'));
        }

        return redirect()->back()->with('fail', 'Error Occurred or POOR NETWORK');
    }

//    Bills Services Products
    public function bills_services_products($iso, $service_id)
    {

        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $diff_hours = $token->updated_at->diffInHours(now());
//        dd($diff_hours);

        $token_auth = json_decode($token);

        if ($diff_hours > 30) {
            $token = $this->reauth_token($token_auth);
        }else{
            $token_auth = json_decode($token)->token;
        }

        $raw_auth = "Authorization: Bearer ".$token_auth;

//        dd($raw_auth);

        $response = Curl::to('https://clients.primeairtime.com/api/billpay/country/'.$iso.'/'.$service_id)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->get();
//

        $data = json_decode($response);
//        dd($data);
        if (isset($data)) {
            $products  = $data->products;

            return view('subscriptions.billpay', compact('products', 'iso', 'service_id'));
        }

        return redirect()->back()->with('fail', 'System error or Poor Network');
    }

    public function top_up_log($iso, $service_id)
    {

        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $diff_hours = $token->updated_at->diffInHours(now());
//        dd($diff_hours);

        $token_auth = json_decode($token);

        if ($diff_hours > 30) {
            $token = $this->reauth_token($token_auth);
        }else{
            $token_auth = json_decode($token)->token;
        }

        $raw_auth = "Authorization: Bearer ".$token_auth;

//        dd($raw_auth);

        $response = Curl::to('https://clients.primeairtime.com/api/billpay/country/'.$iso.'/'.$service_id)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->get();
//

        $data = json_decode($response);
//        dd($data);
        if (isset($data)) {
            $products  = $data->products;

            return view('subscriptions.billpay', compact('products', 'iso', 'service_id'));
        }

        return redirect()->back()->with('fail', 'System error or Poor Network');
    }



//    Toping and Saving Electricity Bills
    public function top_up_bills(Request $request)
    {
        $topup_amount = $request->topup_amount;
        $service_id = $request->service_id;
        $product_id = $request->product_id;
        $iso = $request->iso;
        $min_denomination = $request->min_denomination;
        $max_denomination = $request->max_denomination;
        $meter = $request->smartcard_number;
        $prepaid = $request->meter_type;

        switch ($prepaid)
        {
            case 0:
                $prepaid = true;
                break;

            case 1:
                $prepaid = true;
                break;
            case 2:
                $prepaid = false;
                break;

        }


//        dd($request);
        $membership_id = app('current_user')->membership_id;

        $account_controller = new AccountController();
        $member_balance = $account_controller->check_member_total_reward($membership_id);


        if ($topup_amount > $max_denomination || $topup_amount < $min_denomination)
        {
            return redirect()->route('bills_pay')->with('fail', 'Amount cannot be more than '.$max_denomination . ' or less than '. $min_denomination);
        }

        $bill_amount = $topup_amount;
//        dd($member_balance);
        if ($member_balance < $bill_amount)
        {
            return redirect()->route('bills_pay')->with('fail', 'INSUFFICIENT BALANCE FOR TOPUP');
        }else{
            $deduct = $account_controller->debit_member($membership_id, $bill_amount);

            $transaction_controller = new TransactionController();
            $transaction_controller->log_transaction("DEBIT", $bill_amount, "$service_id Topup", app('current_user')->username);

            if ($deduct == false)
            {
                return redirect()->route('bills_pay')->with('fail', 'INSUFFICIENT BALANCE FOR TOPUP');
            }
        }

        $customer_reference = (string)Str::uuid();

        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $d_data = [
            "meter"=>$meter,
            "prepaid" => $prepaid,
            "denomination" => $topup_amount,
            "product_id" => $product_id,
            "customer_reference" =>$customer_reference
            ];
        $data = json_encode($d_data);
        $raw_auth = "Authorization: Bearer ".$token->token;

//        dd($d_data, $request);

        $response = Curl::to("https://clients.primeairtime.com/api/billpay/electricity/" . $meter)
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->withData($data)
            ->post();

        dd($response);

        $reply = json_decode($response);
//dd($reply);
        if (isset($reply->status) && $reply->status == '201') {
            $subscription = new Subscription([
                'by' => app('current_user')->username,
                'type' => 'ELECTRICITY_TOPUP',
                'product_id' => $product_id,
                'denomination' => $bill_amount,
                'message' => $reply->message,
                'reference' => $reply->reference,
                'topup_currency' => $reply->topup_currency,
                'target' => $reply->target,
                'time' => $reply->time,
                'country' => $reply->country,
                'operator_name' => $reply->operator_name,
                'customer_reference' => $customer_reference,
                'msisdn' => $reply->target,
                'paid_amount' => $reply->paid_amount,
                'topup_amount' => $reply->topup_amount,
                'code' => $reply->code,
                'status' => $reply->status,
                'pin_based' => $reply->pin_based,
                'pin_code' => $reply->pin_code,
                'pin_option1' => $reply->option1,
                'full_response' => $response,

            ]);

            $subscription->save();

            return view('subscriptions.billpay', compact('subscription'))->with('success', 'Your Transaction of ' . $bill_amount . ' to ' . $meter . 'was Successful');
        }
//        dd($reply);

        return redirect()->route('bills_pay')->with('fail', 'topup was NOT SUCCESSFUL - ERROR: '. $reply->error->status);
    }


//    GET INITIAL TOKEN

    public function get_token()
    {
        $response = Curl::to('https://clients.primeairtime.com/api/auth')
            ->withContentType('application/json')
            ->withData('{"username":"subscriptions@epelcon.com","password":"epelcon@3345"}')
            ->post();

//        dd(json_decode($response)->token);

        $de_token = json_decode($response)->token;
        $token = Token::where('for', 'PRIME_AIRTIME')->first();
//        $new_token = new Token([
//            'type' => 'PA_AUTH',
//            'for' => 'PRIME_AIRTIME',
//            'token' => $de_token,
//            'expires' => now()->addHours(30)
//        ]);

        $token->token = $de_token;
        $token->save();

        return $token->token;

//        FOR REAUTH -  RESETTING TOKEN.


    }

//    ?RE-AUTHENTICATE

    public function reauth_token($old_token)
    {

//        dd($old_token->token);

        $response = Curl::to('https://clients.primeairtime.com/api/reauth')
            ->withContentType('application/json')
            ->withHeader("Authorization: Bearer $old_token->token")
            ->get();

//        dd(json_decode($response));
        $data = json_decode($response);

        $new_token = $data->token;


        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $token->token = $new_token;
        $token->expires = now()->addHours(30);
        $token->save();

        return $new_token;

    }

//    TEST API

    public function api_test()
    {
        $response = Curl::to('https://clients.primeairtime.com/api/auth')
            ->withContentType('application/json')
            ->withData('{"username":"subscriptions@epelcon.com","password":"epelcon@3345"}')
            ->post();

//        $response = $request->getBody();

        dd($response);

//        FOR REAUTH -  RESETTING TOKEN.


    }

    public function  validate_smartcard(Request $request)
    {
        $service_id = $request->service_id;
        $product_id = $request->product_id;
        $meter = $request->meter;

        $token = Token::where('for', 'PRIME_AIRTIME')->first();
        $raw_auth = "Authorization: Bearer ".$token->token;

        $data = json_encode(["meter" => $meter]);
//        dd($data);
        $response = Curl::to("https://clients.primeairtime.com/api/billpay/$service_id/$product_id/validate")
            ->withContentType('application/json')
            ->withHeader($raw_auth)
            ->withData($data)
            ->post();

//        dd($response);

        return $response;
    }
}
