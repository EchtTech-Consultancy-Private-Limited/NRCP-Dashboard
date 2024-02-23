<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RabiesTest;
use Illuminate\Support\Facades\Validator;

class RabiesTestController extends Controller
{
    public function index()
    {
        $rabies_test = RabiesTest::where(['soft_delete' => 0])->get();
        return response()->json(['rabies_test' => $rabies_test]);
    }

    public function create()
    {
        $rabies_test = RabiesTest::all();
        return view('rabies_test', compact('rabies_test'));
    }

    public function edit($id)
    {
        $rabies_test = RabiesTest::findOrFail($id);
        return response()->json(['rabies_test' => $rabies_test]);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'date' => 'required',
                'number_of_patients' => 'required',
                'type' => 'required',
            ],[
                'date.required' => 'Date Required',
                'number_of_patients.required' => 'number of patients Required',
                'type.required' => 'Type Required',
            ]);
        
            RabiesTest::insert([
                'date' => $request->date,
                'number_of_patients' => $request->number_of_patients,
                'numbers_of_sample_recieved' => $request->numbers_of_sample_recieved,
                'type' => $request->type,
                'method_of_diagnosis' => $request->method_of_diagnosis,
                'numbers_of_test' => $request->numbers_of_test,
                'numbers_of_positives' => $request->numbers_of_positives,
                'numbers_of_intered_ihip' => $request->numbers_of_intered_ihip,
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
        $rabies_test = RabiesTest::findOrFail($id);
        if ($rabies_test) {
            $validator = Validator::make(
                $request->all(),
                [
                    'date' => 'required',
                ]
            );
            if ($validator->fails()) {
                $notification = [
                    'status' => 201,
                    'message' => $validator->errors()
                ];
            } else {

                $rabies_test = RabiesTest::where('id', $id)->update([
                    'date' => $request->date,
                    'number_of_patients' => $request->number_of_patients,
                    'numbers_of_sample_recieved' => $request->numbers_of_sample_recieved,
                    'type' => $request->type,
                    'method_of_diagnosis' => $request->method_of_diagnosis,
                    'numbers_of_test' => $request->numbers_of_test,
                    'numbers_of_positives' => $request->numbers_of_positives,
                    'numbers_of_intered_ihip' => $request->numbers_of_intered_ihip,
                ]);

                if ($rabies_test == true) {
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
        $rabies_test = RabiesTest::findOrFail($id);
        if ($rabies_test->soft_delete == 0) {
            $rabies_test = RabiesTest::where('id', $id)->update(['soft_delete' => 1]);
        }
        return response()->json('success', 'Deleted successfully.');
    }
}
