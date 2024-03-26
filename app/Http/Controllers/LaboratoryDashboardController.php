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
        $institutes = Institute::with('state')->get();
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
        $instituteYearFilter = $request->instituteYearFilter ?? 'numbers_of_sample_recieved';
        $rabiesTestData = RabiesTest::query();

        if ($filter_month || $filter_year || $filter_institute) {
            if ($filter_month) {
                $rabiesTestData->whereMonth('date', '=', $filter_month);
            }
            if ($filter_year) {
                $rabiesTestData->whereYear('date', '=', $filter_year);
            }
            if ($filter_institute) {
                $rabiesTestData->where('institute_id', $filter_institute);
            }
        }
        // yearly Filter graph
        $attributes = ['numbers_of_sample_recieved','numbers_of_positives', 'number_of_patients', 'numbers_of_test'];
        $yearGraphFilterData = [
            'year' => [],
            'record' => [],
            'sumNumberpositive' => [],
            'sumNumberpatient' => [],
            'sumNumbertest' => []
        ];

        foreach ($attributes as $attribute) {
            $graphDatas = $rabiesTestData->pluck($attribute)->toArray();
            $dates = $rabiesTestData->pluck('date')->toArray();
            $groupedYears = [];
            $years = [];
            $sumNumbers = [];

            foreach ($dates as $date) {
                $year = date('Y', strtotime($date));
                if (!isset($sumNumbers[$year])) {
                    $sumNumbers[$year] = 0;
                }
            }

            foreach ($dates as $index => $date) {
                $year = date('Y', strtotime($date));
                $sumNumbers[$year] += $graphDatas[$index];
                if (!in_array($year, $years)) {
                    $years[] = $year;
                }
            }
            $yearGraphFilterData["sumNumber$attribute"] = array_values($sumNumbers) ?? [];
            $yearGraphFilterData['year'] = $years;
        }
        // monthly wise filter
        $monthGraphData = $rabiesTestData->pluck($instituteYearFilter)->toArray();
        $dates = $rabiesTestData->pluck('date')->toArray();
        $monthGroupedDates = [];
        $Monthmonths = [];
        $monthsumByMonth = [];
        foreach ($dates as $date) {
            $month = date('M', strtotime($date));
            if (!isset($monthsumByMonth[$month])) {
                $monthsumByMonth[$month] = 0;
            }
        }
        foreach ($dates as $index => $date) {
            $month = date('M', strtotime($date));
            $monthsumByMonth[$month] += $monthGraphData[$index];
            $monthGroupedDates[$month][] = $date;
            if (!in_array($month, $Monthmonths)) {
                $Monthmonths[] = $month;
            }
        }
        $monthGraphFilterData = [
            'monthNameGraph' => $Monthmonths,
            'MonthRecord' => array_values($monthsumByMonth), // Extract values of the associative array
        ];
        // line graph data
        $attributes = [$instituteYearFilter,'numbers_of_positives', 'number_of_patients', 'numbers_of_test'];
        $graphFilterData = [
            'monthName' => [],
            'record' => [],
            'sumNumberpositive' => [],
            'sumNumberpatient' => [],
            'sumNumbertest' => []
        ];

        foreach ($attributes as $attribute) {
            $graphDatas = $rabiesTestData->pluck($attribute)->toArray();
            $dates = $rabiesTestData->pluck('date')->toArray();
            $groupedDates = [];
            $months = [];
            $sumNumbers = [];

            foreach ($dates as $date) {
                $month = date('M', strtotime($date));
                if (!isset($sumNumbers[$month])) {
                    $sumNumbers[$month] = 0;
                }
            }

            foreach ($dates as $index => $date) {
                $month = date('M', strtotime($date));
                $sumNumbers[$month] += $graphDatas[$index];
                $groupedDates[$month][] = $date;
                if (!in_array($month, $months)) {
                    $months[] = $month;
                }
            }
            $graphFilterData["sumNumber$attribute"] = array_values($sumNumbers) ?? [];
            $graphFilterData['monthName'] = $months;
        }
        $rabiesData = $rabiesTestData->select(
            'institute_id','state_id',
            \DB::raw('SUM(number_of_patients) as number_of_patients'),
            \DB::raw('SUM(numbers_of_sample_recieved) as numbers_of_sample_recieved'),
            \DB::raw('SUM(numbers_of_positives) as numbers_of_positives'),
            \DB::raw('SUM(numbers_of_intered_ihip) as numbers_of_intered_ihip'),
            \DB::raw('SUM(numbers_of_test) as numbers_of_test')
        )
        ->with('institute', 'state')
        ->groupBy('institute_id','state_id')
        ->get();
        
        $numberOfPatient = $rabiesData->sum('number_of_patients');
        $numbersOfPositives = $rabiesData->sum('numbers_of_positives');
        $numbersOfInteredIhip = $rabiesData->sum('numbers_of_intered_ihip');
        $numberOfSampleReceived = $rabiesData->sum('numbers_of_sample_recieved');
        $testConducted = $rabiesData->sum('numbers_of_test');
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
            $words = explode(" ", $rabiesInstitute->institute->name ?? '');
            $districtName = end($words);
            $finalMapData[] = [
                'state' => $rabiesInstitute->state->state_name ?? '',
                'district' => [$districtName => $numberTestConducted],
                'numberPatients' => $numberPatients,
                'numberReceived' => $numberReceived,
                'numberTestConducted' => $numberTestConducted,
                'numberPositives' => $numberPositives,
                'institute' => $rabiesInstitute->institute->name ?? '',
                'institute_id' => $rabiesInstitute->institute->id ?? '',
            ];

        }
        return response()->json(['total_records'=>$total_records,'finalMapData' => $finalMapData,'graphFilterData' => $graphFilterData,'monthGraphFilterData' => $monthGraphFilterData,'yearGraphFilterData' => $yearGraphFilterData], 200);
    }
}
