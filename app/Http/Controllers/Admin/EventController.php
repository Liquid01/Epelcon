<?php

namespace App\Http\Controllers\Admin;
use App\Attendant;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['members', 'auth'], ['except' => ['save_attendant', 'events', 'event_wlg']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
//        dd($events);

        return view('admin.events.index', compact('events'));
    }


    public function attendance()
    {
        $attendance = Attendant::all();
        return view('admin.events.attendants', compact('attendance'));
    }

    public function event_wlg()
    {
//        dd(str_random(10, 'asdbabsfbdafdbslbfadslfdslfsjldkab'));
        return view('events.index');
    }

    public function save_attendant(Request $request)
    {
//        dd('hey');
        $request->validate([
            'firstname'=> 'required|string',
            'lastname'=> 'required|string',
            'phone'=> 'required|string',
            'email'=> 'required|email',
        ]);
        $seat = rand(10, 200);
        $ticket = rand(12, 1111).'CWNEVTK';

        $attendance = new Attendant([
            'first_name' =>$request->firstname,
            'last_name' =>$request->lastname,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'seat' =>$seat,
            'ticket_id' =>$ticket,

        ]);

        $success = $attendance->save();

        if ($success)
        {
            return redirect()->back()->with('success', 'Seat Reserved Successfully');
        }else{
            return redirect()->back()->with('fail', 'Reservation Failed, Please, Try again');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
