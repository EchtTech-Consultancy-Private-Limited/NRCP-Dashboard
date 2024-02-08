<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenditure;
use Illuminate\Support\Facades\Validator;

class ExpenditureController extends Controller
{
    public function index()
    {
        $expenditure = Expenditure::where(['soft_delete' => 0])->get();
        return response()->json(['expenditure' => $expenditure]);
    }

    public function create()
    {
        return view('expenditure');
    }

    public function edit($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        return response()->json(['expenditure' => $expenditure]);
    }

    public function store(Request $request)
    {       
        $validator = Validator::make(
            $request->all(),
            [
                'financial_year' => 'required',
                'fund_recieved' => 'required',
                'equipment_purchase' => 'required',
            ]
        );
        if ($validator->fails()) {
            $notification = [
                'status' => 201,
                'message' => $validator->errors()
            ];
        } else {
            $expenditure = new Expenditure();
            $expenditure->financial_year = $request->financial_year;
            $expenditure->fund_recieved = $request->fund_recieved;
            $expenditure->equipment_purchase = $request->equipment_purchase;
            $expenditure->save();

            if ($expenditure == true) {
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
        $expenditure = Expenditure::findOrFail($id);
        if ($expenditure) {
            $validator = Validator::make(
                $request->all(),
                [
                    'financial_year' => 'required',
                ]
            );
            if ($validator->fails()) {
                $notification = [
                    'status' => 201,
                    'message' => $validator->errors()
                ];
            } else {

                $expenditure = Expenditure::where('id', $id)->update([
                    'financial_year' => $request->financial_year,
                    'fund_recieved' => $request->fund_recieved,
                    'equipment_purchase' => $request->equipment_purchase,
                ]);

                if ($expenditure == true) {
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
        $expenditure = Expenditure::findOrFail($id);
        if ($expenditure->soft_delete == 0) {
            $expenditure = Expenditure::where('id', $id)->update(['soft_delete' => 1]);
        }
        return response()->json('success', 'Deleted successfully.');
    }
}
