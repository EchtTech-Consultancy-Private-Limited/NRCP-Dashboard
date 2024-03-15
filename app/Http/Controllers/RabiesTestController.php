<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\RabiesTest;
use App\Models\State;
use Auth;
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
        $rabies_test = RabiesTest::with('state')->where(['soft_delete' => 0,'institute_id' => Auth::user()->lab_id])->get();
        return view('rabies_test', compact('rabies_test'));
    }

    public function edit($id)
    {
        $rabiestest = RabiesTest::findOrFail($id);
        $institutes = Institute::get();
        $states = State::get();
        if($rabiestest->type =='For diagnosis'){
            $typea = array(
                'Anti-mortem'  => 'Anti-mortem',
                'Post-Mortem' => 'Post-Mortem',
            );
        }elseif($rabiestest->type =='Titre estimation'){
            $typea = array(
                'Serum' => 'Serum',
                'ISF' => 'ISF',
            );
        }
        if($rabiestest->typea =='Anti-mortem'){
            $typebs = array(
                'Saliva' => 'Saliva',
                'Skin' => 'Skin',
                'Serum' => 'Serum',
                'CSF' => 'CSF',
                'Others' => 'Others',
            );
        }elseif($rabiestest->typea =='Post-Mortem'){
            $typebs = array(
                'CSF' => 'CSF',
                'Brain' => 'Brain',
            );
        }
        $typeb =isset($typebs)?$typebs:'';
        return view('rabies_test_edit', compact('rabiestest','typea','typeb','institutes','states'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'date' => 'required',
                'number_of_patients' => 'required',
                'typefdte' => 'required',
            ],[
                'date.required' => 'Date Required',
                'number_of_patients.required' => 'Number of Patients Required',
                'typefdte.required' => 'Type Required',
            ]);
        
            RabiesTest::insert([
                'date' => $request->date,
                'number_of_patients' => $request->number_of_patients,
                'numbers_of_sample_recieved' => $request->numbers_of_sample_recieved,
                'type' => $request->typefdte,
                'typea' => $request->typea,
                'typeb' => $request->typeb,
                'method_of_diagnosis' => $request->method_of_diagnosis,
                'numbers_of_test' => $request->numbers_of_test,
                'numbers_of_positives' => $request->numbers_of_positives,
                'numbers_of_intered_ihip' => $request->numbers_of_intered_ihip,
                'institute_id' => Auth::user()->lab_id ?? '',
                'state_id' => Auth::user()->state_id ?? '',
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
        $rabies_test = RabiesTest::findOrFail($request->id);
        if ($rabies_test) {
            try{
                $request->validate([
                    'date' => 'required',
                    'number_of_patients' => 'required',
                    'typefdte' => 'required',
                ],[
                    'date.required' => 'Date Required',
                    'number_of_patients.required' => 'Number of Patients Required',
                    'typefdte.required' => 'Type Required',
                ]);
            
                RabiesTest::where('id',$request->id)->update([
                    'date' => $request->date,
                    'number_of_patients' => $request->number_of_patients,
                    'numbers_of_sample_recieved' => $request->numbers_of_sample_recieved,
                    'type' => $request->typefdte,
                    'typea' => $request->typea,
                    'typeb' => $request->typeb,
                    'method_of_diagnosis' => $request->method_of_diagnosis,
                    'numbers_of_test' => $request->numbers_of_test,
                    'numbers_of_positives' => $request->numbers_of_positives,
                    'numbers_of_intered_ihip' => $request->numbers_of_intered_ihip,
                    'institute_id' => Auth::user()->lab_id ?? '',
                'state_id' => Auth::user()->state_id ?? '',
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
            return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $rabies_test = RabiesTest::findOrFail($id);
        if ($rabies_test->soft_delete == 0) {
            $rabies_test = RabiesTest::where('id', $id)->update(['soft_delete' => 1]);
        }
        return response()->json(['message'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
}
