<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenditure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class ExpenditureController extends Controller
{
    public function index()
    {
        $expenditure = Expenditure::where(['soft_delete' => 0])->orderBy('desc')->get();
        return response()->json(['expenditure' => $expenditure]);
    }

    public function create()
    {
        $expenditure = Expenditure::where('user_id', Auth::id())->where(['soft_delete' => 0])->orderBy('created_at','desc')->get();
        $equipment_purchase_masters = DB::table('equipment_purchase_masters')->get();
        return view('expenditure', compact('expenditure','equipment_purchase_masters'));
    }

    public function edit($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        $equipment_purchase_masters = DB::table('equipment_purchase_masters')->get();
        return view('expenditure_edit', compact('expenditure','equipment_purchase_masters'));
       // return response()->json(['expenditure' => $expenditure]);
    }

    public function store(Request $request)
    {   
        try{
            $request->validate([
                'financial_year' => 'required',
                'fund_recieved' => 'required',
                'equipment_purchase' => 'required',
            ],[
                'financial_year.required' => 'Financial year Required',
                'fund_recieved.required' => 'Fund Received Required',
                'equipment_purchase.required' => 'Equipment Purchase Required',
            ]);
        
            Expenditure::insert([
                'user_id' => Auth::id(),
                'financial_year' => $request->financial_year,
                'fund_recieved' => $request->fund_recieved,
                'equipment_purchase' => $request->equipment_purchase
            ]);
        
                $notification = array(
                    'message' => 'Finance Added successfully',
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
        $expenditure = Expenditure::findOrFail($request->id);
        if ($expenditure) {
            try{
                $request->validate([
                    'financial_year' => 'required',
                    'fund_recieved' => 'required',
                    'equipment_purchase' => 'required',
                ],[
                    'financial_year.required' => 'Financial year Required',
                    'fund_recieved.required' => 'Fund Received Required',
                    'equipment_purchase.required' => 'Equipment Purchase Required',
                ]);
            
                Expenditure::where('id',$request->id)->update([
                    'user_id' => Auth::id(),
                    'financial_year' => $request->financial_year,
                    'fund_recieved' => $request->fund_recieved,
                    'equipment_purchase' => $request->equipment_purchase
                ]);
            
                    $notification = array(
                        'message' => 'Finance Update successfully',
                        'alert-type' => 'success'
                    );
                } 
                catch(Throwable $e){report($e);
                    return false;
                } 
            }
            return redirect('expenditure')->with($notification);    
    }

    public function destroy($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        if ($expenditure->soft_delete == 0) {
            $expenditure = Expenditure::where('id', $id)->update(['soft_delete' => 1]);
        }
        return response()->json(['message'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
}
