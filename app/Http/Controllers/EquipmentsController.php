<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipments;
use Illuminate\Support\Facades\Validator;

class EquipmentsController extends Controller
{
    public function index()
    {
        $equipments = Equipments::where(['soft_delete' => 0])->get();
        return response()->json(['equipments' => $equipments]);
    }

    public function create()
    {
        $equipment = Equipments::all();
        return view('equipment', compact('equipment'));
    }

    public function edit($id)
    {
        $equipment_edit = Equipments::findOrFail($id);
        return response()->json(['equipment_edit' => $equipment_edit]);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'equipment' => 'required',
                'quantity' => 'required',
                'year_of_purchase' => 'required',
            ],[
                'equipment.required' => 'Equipment Name Required',
                'quantity.required' => 'Quantity Required',
                'year_of_purchase.required' => 'Year of purchase Required',
            ]);
        
            Equipments::insert([
                'equipment' => $request->equipment,
                'quantity' => $request->quantity,
                'year_of_purchase' => $request->year_of_purchase
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
        $equipment = Equipments::findOrFail($id);
        if ($equipment) {
            $validator = Validator::make(
                $request->all(),
                [
                    'equipment' => 'required',
                ]
            );
            if ($validator->fails()) {
                $notification = [
                    'status' => 201,
                    'message' => $validator->errors()
                ];
            } else {

                $equipment = Equipments::where('id', $id)->update([
                    'equipment' => $request->equipment,
                    'quantity' => $request->quantity,
                    'year_of_purchase' => $request->year_of_purchase,
                ]);

                if ($equipment == true) {
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
        $equipment = Equipments::findOrFail($id);
        if ($equipment->soft_delete == 0) {
            $equipment = Equipments::where('id', $id)->update(['soft_delete' => 1]);
        }
        return response()->json('success', 'Deleted successfully.');
    }
}
