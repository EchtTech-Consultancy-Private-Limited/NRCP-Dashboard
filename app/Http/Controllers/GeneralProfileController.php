<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GeneralProfileController extends Controller
{
    public function index()
    {
        $general_profile = GeneralProfile::where('soft_delete', 0)->orderBy('date_of_joining', 'asc')->get();
        return view('general_profile', compact('general_profile'));

        //return response()->json(['general_profile' => $general_profile]);
    }

    public function create()
    {
        $general_profile = GeneralProfile::where('user_id', Auth::id())->where(['soft_delete' => 0])->orderBy('created_at','desc')->get();
        return view('general_profile', compact('general_profile'));
    }

    public function edit($id)
    {
        $general_profile = GeneralProfile::findOrFail($id);
        return view('general_profile_edit', compact('general_profile'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'state' => 'required',
                'hospital' => 'required',
                'designation' => 'required',
                'contact_number' => 'required', 'nullable|numeric|digits:10', // Make the field nullable
                'date_of_joining' => 'required',
            ],[
                'state.required' => 'State Name field is Required',
                'hospital.required' => 'Hospital Name field is Required',
                'designation.required' => 'Nodal Officer Name field is Required',
                'contact_number.required' => 'Contact Number field is Required',
                'contact_number.digits' => 'Contact Number must be 10 digits',
                'date_of_joining.digits' => 'Date of Joining field required',
            ]);           
        
            GeneralProfile::insert([
                'user_id' => Auth::id(),
                'state' => $request->state,
                'hospital' => $request->hospital,
                'designation' => $request->designation,
                'contact_number' => $request->contact_number,
                // 'mou' => $request->mou,
                'date_of_joining' => $request->date_of_joining,
            ]);
        
                $notification = array(
                    'message' => 'The record has been created successfully!',
                    'alert-type' => 'success'
                );
            } 
            catch(Throwable $e){report($e);
                return false;
            }   
        return redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $general_profile = GeneralProfile::findOrFail($request->id);
        if($general_profile){
            try{
                $request->validate([
                    'state' => 'required',
                    'hospital' => 'required',
                    'designation' => 'required',
                    'contact_number' => 'nullable|numeric|digits:10', // Make the field nullable
                ],[
                    'state.required' => 'State Name Required',
                    'hospital.required' => 'Hospital Name Required',
                    'designation.required' => 'Nodal Officer Name Required',
                    'contact_number.numeric' => 'Contact Number must be numeric',
                    'contact_number.digits' => 'Contact Number must be 10 digits',
                ]); 
            
                GeneralProfile::where('id',$request->id)->update([
                    'user_id' => Auth::id(),
                    'state' => $request->state,
                    'hospital' => $request->hospital,
                    'designation' => $request->designation,
                    'contact_number' => $request->contact_number,
                    // 'mou' => $request->mou,
                    'date_of_joining' => $request->date_of_joining,
                ]);
            
                    $notification = array(
                        'message' => 'The record has been updated successfully!',
                        'alert-type' => 'success'
                    );
                } 
                catch(Throwable $e){report($e);
                    return false;
                } 
            }  
            return redirect('/general-laboratory')->with($notification);        
    }

    public function destroy($id)
    {  
        $general_profile = GeneralProfile::findOrFail($id);
        if ($general_profile->soft_delete == 0) {
            $general_profile = GeneralProfile::where('id', $id)->update(['soft_delete' => 1]);
        }
        
    	return response()->json(['message'=>"The record has been deleted successfully!",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
        //return response()->json('success', 'Deleted successfully.');
    }
}
