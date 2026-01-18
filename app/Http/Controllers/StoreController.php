<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Mockery\Exception;
use PragmaRX\Countries\Package\Countries;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_store()
    {
//        dd('hi');
        $countries = new Countries();

        $states = $countries->where('name.common', 'Nigeria')->first()
            ->hydrateStates()->states->pluck('name', 'postal')->toArray();

//        dd($states);

        return view('stockists.store.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:200',
            'user_id' => 'integer|unique:stores,user_id|max:200',
            'address1' => 'string|required|max:200',
            'address2' => 'string|max:200',
            'city' => 'string|required|max:50',
            'state' => 'string|required|max:50',
            'phone' => 'string|required|max:15',
            'phone2' => 'string|max:15',
        ]);

        $store = new Store([
            'user_id' => app('current_user')->id,
            'name' => $request->name,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'state' => $request->state,
            'country' => $request->country,
        ]);

        $store->save();

        return redirect()->route('stockist_store')->with('success', 'Store created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function stockist_store()
    {
        $store = Store::where('user_id', app('current_user')->id)->first();
        if ($store)
        {
            return view('stockists.store.details', compact('store'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function stockist_edit_store(Store $store)
    {
        $countries = new Countries();

        $states = $countries->where('name.common', 'Nigeria')->first()
            ->hydrateStates()->states->pluck('name', 'postal')->toArray();

        return view('stockists.store.edit', compact('store', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function stockist_update_store(Request $request, Store $store)
    {
        $request->validate([
            'name' => 'string|required|max:200',
            'user_id' => 'integer|unique:stores,user_id|max:200',
            'address1' => 'string|required|max:200',
            'address2' => 'string|max:200',
            'city' => 'string|required|max:50',
            'state' => 'string|required|max:50',
            'phone' => 'string|required|max:15',
            'phone2' => 'string|max:15',
        ]);

        try {

            $store->update([
                'name' => $request->name,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'phone' => $request->phone,
                'phone2' => $request->phone2,
                'state' => $request->state,
                'country' => $request->country,
            ]);
        }catch (Exception $exception)
        {
            return redirect()->route('stockist_store')->with('fail', 'Store Could Not be Created');

        }
        return redirect()->route('stockist_store')->with('success', 'Store created Successfully');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
