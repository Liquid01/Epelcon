<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    //

    public  function general_settings()
    {
        $settings = Setting::all();
        return view('admin.settings.general_settings', compact('settings'));
    }

    public  function system_settings()
    {
        return view('admin.settings.system_settings');
    }

    public  function open_withdrawals(Setting $setting)
    {
        if ($setting)
        {
            $setting->status = 1;
            $setting->save();

            return redirect()->back()->with('success', 'WITHDRAWALS NOW OPEN');
        }
//        return view('admin.settings.system_settings');
    }

    public  function close_withdrawals(Setting $setting)
    {

        if ($setting)
        {
            $setting->status = 0;
            $setting->save();

            return redirect()->back()->with('success', 'WITHDRAWALS CLOSED SUCCESSFULLY');
        }
//        return view('admin.settings.system_settings');
    }


}
