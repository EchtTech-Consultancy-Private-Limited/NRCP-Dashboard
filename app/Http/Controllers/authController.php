<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,DB;
use app\Models\User;

class authController extends Controller
{    
    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        return view('login');
    }
    
    /**
     * adminLogin
     *
     * @return void
     */
    public function adminLogin()
    {
        return view('admin.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:50', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'password' => 'required|min:8|max:15',
                'captcha' => 'required|captcha',
                'user_type' => 'required'
                ]
                ,[
                    'captcha.captcha' => 'Invalid captcha code.',

                ]
        );
        $exitUser = DB::table('dashboard_login')->where('email',$request->email)->where('user_type',$request->user_type)->first();
        if($exitUser == null){
            return redirect()->back()->with('error', 'User do not match for this user type');
        }else{
            if($request->user_type == '2'){
                $redirect = 'lab-dashboard';
            }elseif($request->user_type == 3){
                $redirect = 'states/dashboard';
            }elseif($request->user_type == 4){
                $redirect = 'admin/dashboard';
            }
            else{
                $redirect = 'dashboard';
            }
            if (Auth::attempt($request->only('email','password'))) {
                session(['loggedIn' => true]);
                if (session('loggedIn')) {
                    return redirect()->intended($redirect)->with('success', 'Login successfull!!');
                }
            } else {
                return redirect()->back()->with('error', 'Email and/or password invalid.');
            }
        }
    }


    public function logout()
    {
        Auth::logout();
        session()->forget('loggedIn');
        return redirect('/')->with('success', 'Logout successfull!!');
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }
}
