<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ProfileController extends Controller
{
    public function getUserProfile(Request $request)
    {
        $states = State::get(); 
        $institutes = Institute::get();
        $user = DB::table('dashboard_login')->where('id', Auth::user()->id)->first(); 
        return view('auth.profile',compact('user','states','institutes'));
    }

    public function getUserPassword(Request $request){
        return view('auth.password-update');
    }

    /**
     *  @changePassword
     *
     * @return void
     */
    public function changePassword(Request $request, $id = '') { 
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
        ],
        [
            'oldpassword.required' => 'The old password field is required.',
            'newpassword.required' => 'The new password field is required.',
        ]);
    
        try {
            DB::beginTransaction();
            
            $user = DB::table('dashboard_login')->where('id', $id)->first();
            if (!$user || !Hash::check($request->oldpassword, $user->password)) {
                return redirect()->back()->with('error', 'Old password is incorrect');
            }
    
            DB::table('dashboard_login')
                ->where('id', $id)
                ->update(['password' => Hash::make($request->newpassword)]);
    
            DB::commit();
            return redirect()->back()->with('message', 'Your password has been changed');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
}
