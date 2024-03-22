<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralProfile;
use Illuminate\Support\Facades\Validator;

class GeneralProfileController extends Controller
{
    public function index()
    {
        $general_profile = GeneralProfile::where(['soft_delete' => 0])->get();

        return view('general_profile', compact('general_profile'));

        //return response()->json(['general_profile' => $general_profile]);
    }

    public function create()
    {
        $general_profile = GeneralProfile::where(['soft_delete' => 0])->orderBy('created_at','desc')->get();
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
                'contact_number' => 'nullable|numeric|digits:10', // Make the field nullable
            ],[
                'state.required' => 'State Name Required',
                'hospital.required' => 'Hospital Name Required',
                'contact_number.numeric' => 'Contact Number must be numeric',
                'contact_number.digits' => 'Contact Number must be 10 digits',
            ]);           
        
            GeneralProfile::insert([
                'state' => $request->state,
                'hospital' => $request->hospital,
                'designation' => $request->designation,
                'contact_number' => $request->contact_number,
                // 'mou' => $request->mou,
                'date_of_joining' => $request->date_of_joining,
            ]);
        
                $notification = array(
                    'message' => 'Added successfully',
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
                    'contact_number' => 'nullable|numeric|digits:10', // Make the field nullable
                ],[
                    'state.required' => 'State Name Required',
                    'hospital.required' => 'Hospital Name Required',
                    'contact_number.numeric' => 'Contact Number must be numeric',
                    'contact_number.digits' => 'Contact Number must be 10 digits',
                ]); 
            
                GeneralProfile::where('id',$request->id)->update([
                    'state' => $request->state,
                    'hospital' => $request->hospital,
                    'designation' => $request->designation,
                    'contact_number' => $request->contact_number,
                    // 'mou' => $request->mou,
                    'date_of_joining' => $request->date_of_joining,
                ]);
            
                    $notification = array(
                        'message' => 'Update successfully',
                        'alert-type' => 'success'
                    );
                } 
                catch(Throwable $e){report($e);
                    return false;
                } 
            }  
            return redirect('/general-profile')->with($notification);        
    }

    public function destroy($id)
    {  
        $general_profile = GeneralProfile::findOrFail($id);
        if ($general_profile->soft_delete == 0) {
            $general_profile = GeneralProfile::where('id', $id)->update(['soft_delete' => 1]);
        }
        
    	return response()->json(['message'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
        //return response()->json('success', 'Deleted successfully.');
    }
}
