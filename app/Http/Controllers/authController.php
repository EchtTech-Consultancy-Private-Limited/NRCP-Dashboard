<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use app\Models\User;

class authController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function loginSubmit(Request $request)
    {
        //dd($request->all());

        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:50', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'password'          => 'required|min:8|max:15',
            ]
        );

        if (Auth::attempt($request->only('email','password','user_type','section_type'))) {
            return redirect()->intended('/dashboard')->with('success', 'Login successfull!!');
        } else {
            return redirect()->back()->with('error', 'Email and/or password invalid.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout successfull!!');
    }
}
