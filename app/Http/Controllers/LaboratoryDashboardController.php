<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\RabiesTest;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class LaboratoryDashboardController extends Controller
{    
    /**
     *  @ laboratory dashboard index function
     *
     * @return void
     */
    public function index()
    {
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

        return view('laboratory_dashboard',compact('months','numberOfPatient','numberOfSampleReceived','numbersOfPositives','numbersOfInteredIhip','institutes'));
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
        $filter_institute = $request->institute ?? $request->mapFilter ?? '';
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
        $rabiesData = $rabiesData->select(
            'institute_id','state_id',
            \DB::raw('SUM(number_of_patients) as number_of_patients'),
            \DB::raw('SUM(numbers_of_sample_recieved) as numbers_of_sample_recieved'),
            \DB::raw('SUM(numbers_of_positives) as numbers_of_positives'),
            \DB::raw('SUM(numbers_of_intered_ihip) as numbers_of_intered_ihip')
        )
        ->with('institute', 'state')
        ->groupBy('institute_id','state_id')
        ->get();
        $numberOfPatient = $rabiesData->sum('number_of_patients');
        $numberOfSampleReceived = $rabiesData->sum('numbers_of_sample_recieved');
        $testConducted = $rabiesData->sum('numbers_of_test');
        $numbersOfPositives = $rabiesData->sum('numbers_of_positives');
        $numbersOfInteredIhip = $rabiesData->sum('numbers_of_intered_ihip');
        $total_records = [
            'number_of_patients' => $numberOfPatient,
            'numbers_of_sample_received' => $numberOfSampleReceived,
            'testConducted' => $testConducted,
            'numbers_of_positives' => $numbersOfPositives,
            'numbers_of_intered_ihip' => $numbersOfInteredIhip,
        ];
        $finalMapData = [];
        foreach ($rabiesData as $key => $rabiesInstitute) {
            $rabiesRecords = RabiesTest::query();
            $rabiesRecords->where('institute_id', $rabiesInstitute->institute_id);
            $numberPatients = $rabiesRecords->sum('number_of_patients');
            $numberReceived = $rabiesRecords->sum('numbers_of_sample_recieved');
            $numberTestConducted = $rabiesRecords->sum('numbers_of_test');
            $numberPositives = $rabiesRecords->sum('numbers_of_positives');
            $finalMapData[] = [
                'state' => $rabiesInstitute->state->state_name ?? '',
                'numberPatients' => $numberPatients,
                'numberReceived' => $numberReceived,
                'numberTestConducted' => $numberTestConducted,
                'numberPositives' => $numberPositives,
                'institute' => $rabiesInstitute->institute->name ?? '',
                'institute_id' => $rabiesInstitute->institute->id ?? '',
            ];
        }
        return response()->json(['total_records'=>$total_records,'finalMapData' => $finalMapData], 200);
    }
}
