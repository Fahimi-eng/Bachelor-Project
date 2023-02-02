<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function edit()
    {
        return view('Admin.Setting.edit',[
            'settings' => Setting::query()->first()
        ]);
    }

    public function update(Request $request , Setting $setting)
    {
        $setting->update([
            'header_title' => \request('header_title'),
            'header_body' => \request('header_body'),
            'about_title' => \request('about_title'),
            'about_body' => \request('about_body'),
            'about_lunch' => \request('about_lunch'),
            'about_dinner' => \request('about_dinner'),
            'footer_body' => \request('footer_body'),
            'address' => \request('address'),
            'instagram' => \request('instagram'),
            'twitter' => \request('twitter'),
            'facebook' => \request('facebook'),
            'contact' => \request('contact')
        ]);
        return redirect()->back();
    }
}
