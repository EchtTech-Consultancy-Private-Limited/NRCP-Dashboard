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
        return response()->json(['general_profile' => $general_profile]);
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

        $validator = Validator::make(
            $request->all(),
            [
                'state' => 'required',
                'hospital' => 'required',
            ]
        );
        if ($validator->fails()) {
            $notification = [
                'status' => 201,
                'message' => $validator->errors()
            ];
        } else {
            $general_profile = new GeneralProfile();
            $general_profile->state = $request->state;
            $general_profile->hospital = $request->hospital;
            $general_profile->designation = $request->designation;
            $general_profile->contact_number = $request->contact_number;
            $general_profile->mou = $request->mou;
            $general_profile->date_of_joining = $request->date_of_joining;
            $general_profile->save();

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
        return response()->json('success', 'Deleted successfully.');
    }
}
