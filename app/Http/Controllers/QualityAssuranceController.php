<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QualityAssurance;
use Illuminate\Support\Facades\Validator;

class QualityAssuranceController extends Controller
{
    public function index()
    {
        $quality_assurances = QualityAssurance::where(['soft_delete'=>0])->get();
        return view('quality_assurance', compact('quality_assurances'));
        //return response()->json(['quality_assurance' => $quality_assurance]);
    }
    
    public function create()
    {   
        $quality_assurances = QualityAssurance::where(['soft_delete'=>0])->get();
        return view('quality_assurance', compact('quality_assurances'));
    }

    public function edit($id)
    {
        $quality_assurance = QualityAssurance::findOrFail($id);
        return response()->json(['quality_assurance' => $quality_assurance]);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'pt' => 'required',
                'accredited_pt' => 'required',
            ],[
                'pt.required' => 'PT Name Required',
                'accredited_pt.required' => 'accredited Name Required',
            ]);
        
            QualityAssurance::insert([
                'pt' => $request->pt,
                'accredited_pt' => $request->accredited_pt,
                'supervisors_trained' => $request->supervisors_trained??'NULL',
                'lims' => $request->lims??'NULL',
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
        $quality_assurance=QualityAssurance::findOrFail($id);
        if($quality_assurance)
        {
         $validator=Validator::make($request->all(),
            [
                'pt' => 'required',
                'accredited_pt' => 'required',
                'supervisors_trained' => 'required',
                'lims' => 'required',
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>201,
                'message'=> $validator->errors()
            ];
        }
        else{
            
            $quality_assurance= QualityAssurance::where('id',$id)->update([
                    'pt' => $request->pt,
                    'accredited_pt' => $request->accredited_pt,
                    'supervisors_trained' => $request->supervisors_trained,
                    'lims' => $request->lims,
                ]);
           
        if($quality_assurance == true)
        {
            $notification =[
                'status'=>200,
                'message'=>'Added successfully.'
            ];
        }
        else{
            $notification = [
                    'status'=>201,
                    'message'=>'some error accoured.'
                ];
             }
        }
        return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        $quality_assurance = QualityAssurance::findOrFail($id);
        if($quality_assurance->soft_delete==0)
            {
                $quality_assurance= QualityAssurance::where('id',$id)->update(['soft_delete'=>1]);
        }
            return response()->json('success','Deleted successfully.');
    }
}
