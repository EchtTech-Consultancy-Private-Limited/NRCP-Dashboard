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
        $general_profile = GeneralProfile::all();
        return view('general_profile', compact('general_profile'));
    }

    public function edit($id)
    {
        $general_profile = GeneralProfile::findOrFail($id);
        return response()->json(['general_profile' => $general_profile]);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'state' => 'required',
                'hospital' => 'required',
            ],[
                'state.required' => 'State Name Required',
                'hospital.required' => 'Hospital Name Required',
            ]);
        
            GeneralProfile::insert([
                'state' => $request->state,
                'hospital' => $request->hospital,
                'designation' => $request->designation??'NULL',
                'contact_number' => $request->contact_number??'NULL',
                'mou' => $request->mou??'NULL',
                'date_of_joining' => $request->date_of_joining??'NULL',
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

    public function update(Request $request, $id)
    {
        $general_profile = GeneralProfile::findOrFail($id);
        if ($general_profile) {
            $validator = Validator::make(
                $request->all(),
                [
                    'state' => 'required',
                ]
            );
            if ($validator->fails()) {
                $notification = [
                    'status' => 201,
                    'message' => $validator->errors()
                ];
            } else {

                $general_profile = GeneralProfile::where('id', $id)->update([
                    'state' => $request->state,
                    'hospital' => $request->hospital,
                    'designation' => $request->designation,
                    'contact_number' => $request->contact_number,
                    'mou' => $request->mou,
                    'date_of_joining' => $request->date_of_joining,
                ]);

                if ($general_profile == true) {
                    $notification = [
                        'status' => 200,
                        'message' => 'Added successfully.'
                    ];
                } else {
                    $notification = [
                        'status' => 201,
                        'message' => 'some error accoured.'
                    ];
                }
            }
            return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        $general_profile = GeneralProfile::findOrFail($id);
        if ($general_profile->soft_delete == 0) {
            $general_profile = GeneralProfile::where('id', $id)->update(['soft_delete' => 1]);
        }
    	return response()->json(['success'=>"Deleted successfully.", 'tr'=>'tr_'.$id]);
        //return response()->json('success', 'Deleted successfully.');
    }
}
