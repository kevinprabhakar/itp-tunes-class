<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Configuration;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/profile',[
            'user' => Auth::user()
        ]);
    }

    public function settings()
    {
        return view('settings');
    }

    public function toggleMaintenance(Request $request)
    {
        $maintenanceSetting = Configuration::where('name','maintenance')->first();

        if ($request->has('maintenance')){
            $maintenanceSetting->value = 'on';
            $maintenanceSetting->save();
        }else{
            $maintenanceSetting->value = 'off';
            $maintenanceSetting->save();
        }

        return redirect('/');
    }
}
