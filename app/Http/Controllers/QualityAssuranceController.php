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

        return view('quality_assurance_edit', compact('quality_assurance'));
       // return response()->json(['quality_assurance' => $quality_assurance]);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'pt' => 'required',
                'accredited_pt' => 'required',
            ],[
                'pt.required' => 'PTILCPR Required',
                'accredited_pt.required' => 'PTPNABL Required',
            ]);
        
            QualityAssurance::insert([
                'pt' => $request->pt,
                'accredited_pt' => $request->accredited_pt,
                'supervisors_trained' => $request->supervisors_trained??'NULL',
                'lims' => $request->lims??'NULL',
            ]);
        
                $notification = array(
                    'message' => 'Quality Added successfully',
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
        $quality_assurance=QualityAssurance::findOrFail($request->id);
        if($quality_assurance)
        {
            try{
                $request->validate([
                    'pt' => 'required',
                    'accredited_pt' => 'required',
                ],[
                    'pt.required' => 'PTILCPR Required',
                    'accredited_pt.required' => 'PTPNABL Required',
                ]);
            
                QualityAssurance::where('id',$request->id)->update([
                    'pt' => $request->pt,
                    'accredited_pt' => $request->accredited_pt,
                    'supervisors_trained' => $request->supervisors_trained??'NULL',
                    'lims' => $request->lims??'NULL',
                ]);
            
                    $notification = array(
                        'message' => 'Quality Update successfully',
                        'alert-type' => 'success'
                    );
                } 
                catch(Throwable $e){report($e);
                    return false;
                } 
            }
            return redirect('quality-assurance')->with($notification);
    }

    public function destroy($id)
    {
        $quality_assurance = QualityAssurance::findOrFail($id);
        if($quality_assurance->soft_delete==0)
            {
                $quality_assurance= QualityAssurance::where('id',$id)->update(['soft_delete'=>1]);
        }
        return response()->json(['message'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
}
