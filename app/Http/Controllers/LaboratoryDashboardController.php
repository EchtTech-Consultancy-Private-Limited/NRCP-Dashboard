<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RabiesTest;

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
        $numberOfPatient = $rabiesData->sum('number_of_patients');
        $numberOfSampleReceived = $rabiesData->sum('numbers_of_sample_recieved');
        $numbersOfPositives = $rabiesData->sum('numbers_of_positives');
        $numbersOfInteredIhip = $rabiesData->sum('numbers_of_intered_ihip');

        return view('laboratory_dashboard',compact('breadCrum','months','numberOfPatient','numberOfSampleReceived','numbersOfPositives','numbersOfInteredIhip'));
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
        $rabiesData = RabiesTest::query();

        if ($filter_month || $filter_year) {
            if ($filter_month) {
                $rabiesData->whereMonth('date', '=', $filter_month);
            }
            if ($filter_year) {
                $rabiesData->whereYear('date', '=', $filter_year);
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
        return response()->json(['total_records'=>$total_records], 200);
    }
}
