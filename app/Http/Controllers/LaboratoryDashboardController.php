<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\RabiesTest;
use App\Models\State;

class LaboratoryDashboardController extends Controller
{    
    /**
     *  @ laboratory dashboard index function
     *
     * @return void
     */
    public function index()
    {
        $breadCrum = "Laboratory Dashboard";
        $months = [];
        for ($m=1; $m<=12; $m++) {
            $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        $rabiesData = RabiesTest::get();
        $institutes = Institute::get();
        $numberOfPatient = $rabiesData->sum('number_of_patients');
        $numberOfSampleReceived = $rabiesData->sum('numbers_of_sample_recieved');
        $numbersOfPositives = $rabiesData->sum('numbers_of_positives');
        $numbersOfInteredIhip = $rabiesData->sum('numbers_of_intered_ihip');

        return view('laboratory_dashboard',compact('breadCrum','months','numberOfPatient','numberOfSampleReceived','numbersOfPositives','numbersOfInteredIhip','institutes'));
    }
    
    /**
     *  @ get filter laboratory data getFilterLaboratoryData
     *
     * @return void
     */
    public function getFilterLaboratoryData(Request $request)
    {
        $filter_month = $request->month ?? '';
        $filter_year = $request->year ?? '';
        $filter_institute = $request->institute ?? '';
        $rabiesData = RabiesTest::query();

        if ($filter_month || $filter_year || $filter_institute) {
            if ($filter_month) {
                $rabiesData->whereMonth('date', '=', $filter_month);
            }
            if ($filter_year) {
                $rabiesData->whereYear('date', '=', $filter_year);
            }
            if ($filter_institute) {
                $rabiesData->where('institute_id', $filter_institute);
            }
        }
        $rabiesData = $rabiesData->get();
        $numberOfPatient = $rabiesData->sum('number_of_patients');
        $numberOfSampleReceived = $rabiesData->sum('numbers_of_sample_recieved');
        $numbersOfPositives = $rabiesData->sum('numbers_of_positives');
        $numbersOfInteredIhip = $rabiesData->sum('numbers_of_intered_ihip');
        $total_records = [
            'number_of_patients' => $numberOfPatient,
            'numbers_of_sample_received' => $numberOfSampleReceived,
            'numbers_of_positives' => $numbersOfPositives,
            'numbers_of_intered_ihip' => $numbersOfInteredIhip,
        ];
        $finalMapData = [];
        if ($filter_institute) {
            $instituteId = RabiesTest::with('state')->where('institute_id',$filter_institute)->pluck('state_id');
            $states = State::whereIn('id',$instituteId)->get();
        }else{
            $states = State::get();
        }
        foreach($states as $key => $state)
        {
            $rabiesMapData = RabiesTest::with('state')->where('state_id',$state->id)->get();
            $numberReceived = $rabiesMapData->sum('numbers_of_sample_recieved');
            $finalMapData[] = [
                'state' => $state->state_name,
                'numberReceived' => $numberReceived,
                'institute' => 'institute name', 
            ];
        }
        
        return response()->json(['total_records'=>$total_records,'finalMapData' => $finalMapData], 200);
    }
}
