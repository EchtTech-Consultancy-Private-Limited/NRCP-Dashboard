<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $users = DB::table('dashboard_login')->get();
        return view('admin.dashboard', compact('users'));
    }
    
    /**
     * userList
     *
     * @return void
     */
    public function userList()
    {
        $users = DB::table('dashboard_login')->whereNotIn('user_type', ['4'])->get();
        $states = State::orderBy('state_name','asc')->get();
        return view('admin.user_list', compact('users','states'));
    }
    
    /**
     * userSave
     *
     * @param  mixed $request
     * @return void
     */
    public function userSave(Request $request)
    {
        $request->validate([
            'name' => 'regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email',
            'password' => 'required',
            'state_id' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);
        try{
            DB::table('dashboard_login')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'state_id' => $request->state_id,
                'lab_id' => $request->institute_id,
                'user_type' => $request->user_type,
                'status' => $request->status,
            ]);
            $notification = array(
                'message' => 'User Add successfully',
                'alert-type' => 'success'
            );
        }catch(Exception $e){report($e);
            return false;
        } 
        return redirect()->back()->with($notification);
    }

        /**
     * facilityMappingEdit
     *
     * @param  mixed $id
     * @return void
     */
    public function userEdit($id ='')
    {
        $states = State::get();
        $institutes = Institute::get();
        $user = DB::table('dashboard_login')->where('id', $id)->first();
        return view('admin.user_edit',compact('user','states','institutes'));
    }

    public function userUpdate(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email',
            'state_id' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);

        // Prepare the data for insertion/updation
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'state_id' => $request->state_id,
            'lab_id' => $request->institute_id,
            'user_type' => $request->user_type,
            'status' => $request->status,
        ];

        // Hash and include password only if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($id) {
            // Update existing user
            DB::table('dashboard_login')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'User has been updated successfully',
                'alert-type' => 'success'
            );
        } else {
            // Insert new user
            DB::table('dashboard_login')->insert($data);
            $notification = array(
                'message' => 'User has been update successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('admin.user')->with($notification);
    }
    
    /**
     * userDelete
     *
     * @param  mixed $id
     * @return void
     */
    public function userDelete($id = '')
    {
        $user = DB::table('dashboard_login')->where('id', $id)->delete();
        $notification = array(
            'message' => 'User has been delete successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.user')->with($notification);
    }
}
