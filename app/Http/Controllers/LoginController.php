<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('Client.login');
    }

    public function store(Request $request)
    {
        $request->validate([
           'username' => ['required','exists:users,name'],
            'password' => ['required']
        ]);
        $user = User::query()->where('name' , $request->get('username'))->first();
        if(Hash::check($request->get('password') , $user->password))
        {
            auth()->login($user);
            return redirect()->route('panel.dashboard');
        }
        return redirect()->back()->withErrors(['message' => 'the password is incorrect']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
