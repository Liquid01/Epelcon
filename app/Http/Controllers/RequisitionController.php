<?php

namespace App\Http\Controllers;

use App\Requisition;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    //

    public  function __construct()
    {
        return $this->middleware(['auth', 'members']);
    }

    public  function member_request()
    {
        return view('requisition.create');
    }

    public function save_member_request(Request $request)
    {
        $request->validate([
            'subject' => 'string|required',
            'body' => 'string|required'
        ]);

        $user = app('current_user');

        $request = new Requisition([
            'subject' => $request->subject,
            'user_id' => $user->id,
            'body' => $request->body,
        ]);

        $request->save();

        return redirect()->back()->with('success', 'Request Sent Successfully; It will be attended to Shortly');




    }
}
