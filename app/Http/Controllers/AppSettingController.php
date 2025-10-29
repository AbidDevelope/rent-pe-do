<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index()
    {
        $setting = AppSetting::first();
        return view('appSetting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = AppSetting::first();

        AppSetting::updateOrCreate(
            [
                'id' => $setting->id ?? 0
            ],
            [
                'ads_count' => $request->ads_count,
                'ads_show' => $request->ads_show ? true : false
            ]
        );

        return redirect()->back()->with('success', 'Setting Updated Successfully');
    }
}
