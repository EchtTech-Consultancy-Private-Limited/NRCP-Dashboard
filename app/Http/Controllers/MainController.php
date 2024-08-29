<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Hash;
use Redirect;
use File;
use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Expenditure;
use App\Models\GeneralProfile;
use App\Models\QualityAssurance;
use App\Models\RabiesTest;
use App\Models\State;
use App\Models\StateMonthlyReport;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use App\Exports\StateMonthlyReportExport;
use Excel;

class MainController extends Controller
{
    
    public function dashboard(Request $request)
    {
        if (Auth::user()->user_type == 3) {
            return redirect()->route('state.dashboard');
        }
        $months = [];
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-01-01");
            $month->modify("+$m months");
            $months[] = $month->format('F');
        }
        $total = StateMonthlyReport::toBase()
                ->select([
                    DB::raw('SUM(total_health_facilities_anaimal_bite) as sum_total_health_animal'),
                    DB::raw('SUM(total_health_facilities_submitted_monthly) as total_health_facilities_submitted'),
                    DB::raw('SUM(total_patients_animal_biting + total_stray_dog_bite + total_pet_dog_bite + total_cat_bite + total_monkey_bite + total_others_bite) as total_patients'),
                    DB::raw('SUM(total_stray_dog_bite + total_pet_dog_bite) as total_dog_bite'),
                    DB::raw('SUM(confirmed_suspected_rabies_deaths + suspected_rabies_cases_opd + suspected_rabies_cases_admitted + suspected_rabies_cases_left_against_medical + suspected_rabies_deaths) as suspected_death_reports'),
                    DB::raw('SUM(dh_of_arv + sdh_of_arv + chc_of_arv + phc_of_arv) as availability_arv'),
                    DB::raw('SUM(dh_of_ars + sdh_of_ars + chc_of_ars + phc_of_ars) as availability_ars')
                ])
                ->first();
        $states = State::count();
        return view("dashboard", compact('total','months','states'));
    }
    /**
     * nationalHighchart
     *
     * @return void
     */
    public function nationalHighchart(Request $request)
    {
        $totalStates = State::count();
        $totalCount = StateMonthlyReport::distinct('state_id')->count();
        $totalPrecentage = round(($totalCount/$totalStates)*100, 1);;
        $totalPrecentageNot = 100-$totalPrecentage;
        $monthlyReport = [
                'totalPrecentage' => $totalPrecentage,
                'totalPrecentageNot' => $totalPrecentageNot,
                'totalNumRecieved' => $totalCount,
                'totalNumNotRecieved' => $totalStates-$totalCount,
            ];
        // State wise Bar Graph
        $states = State::get();
        $stateBarGraph = [];
        foreach($states as $key => $state)
        {
            $totalCount = StateMonthlyReport::where('state_id',$state->id)->count();
            $stateBarGraph[] = [ucwords($state->state_name),$totalCount];
        }
        // End State wise Bar Graph

        // Availability of ARV
        $totalArv = [];        
        foreach ($states as $state) {
            $totalOpeningBalance = StateMonthlyReport::where('state_id', $state->id)->sum('dh_of_arv');
            $totalQuantityReceived = StateMonthlyReport::where('state_id', $state->id)->sum('sdh_of_arv');
            $totalQuantityUtilized = StateMonthlyReport::where('state_id', $state->id)->sum('chc_of_arv');
            $totalClosingBalance = StateMonthlyReport::where('state_id', $state->id)->sum('phc_of_arv');
            $totalCount = $totalOpeningBalance + $totalQuantityReceived + $totalQuantityUtilized + $totalClosingBalance;
            $totalArv[] = [ucwords($state->state_name), $totalCount];
        }

        // Availability of ARS
        $totalArs = [];        
        foreach ($states as $state) {
            $totalOpeningBalance = StateMonthlyReport::where('state_id', $state->id)->sum('dh_of_ars');
            $totalQuantityReceived = StateMonthlyReport::where('state_id', $state->id)->sum('sdh_of_ars');
            $totalQuantityUtilized = StateMonthlyReport::where('state_id', $state->id)->sum('chc_of_ars');
            $totalClosingBalance = StateMonthlyReport::where('state_id', $state->id)->sum('phc_of_ars');
            $totalCount = $totalOpeningBalance + $totalQuantityReceived + $totalQuantityUtilized + $totalClosingBalance;
            $totalArs[] = [ucwords($state->state_name), $totalCount];
        }
        // End State wise Bar Graph

        // State wise Patient Report
        $statePatientReport = [];
        foreach ($states as $state) {
            $totalPatientCount = StateMonthlyReport::where('state_id', $state->id)->count();
            $totalPatientPrecentage = round(($totalPatientCount/$totalStates)*100, 1);
            $totalPatientPrecentageNot = 100-$totalPatientPrecentage;
            $stateName = strtoupper(str_replace('in-','',$state->state_code));
            $statePatientReport[] = [
                'state_name' => $stateName,
                'total_patient_precentage' => $totalPatientPrecentage,
                'total_patient_precentage_not' => $totalPatientPrecentageNot,
            ];
            $statePatientReportMap[] = [
                'hc-key' => $state->state_name,
                'value' => $totalPatientPrecentage,
                // 'total_patient_precentage_not' => $totalPatientPrecentageNot,
            ];
        }
        //  End State wise Patient Report
        
        return response()->json([
            'programUserDetails' => $monthlyReport,
            'stateBarGraph' => $stateBarGraph,
            'totalArv' => $totalArv,
            'totalArs' => $totalArs,
            'statePatientReport' => $statePatientReport,
            'statePatientReportMap' => $statePatientReportMap,
        ], 200);
    }
    
    /**
     * filterNationalHighchart
     *
     * @return void
     */
    public function filterNationalHighchart(Request $request)
    {
        $totalStates = State::count();
        $baseQuery = StateMonthlyReport::query();
        if ($request->has('state_bar_graph_year') && $request->state_bar_graph_year) {
            $baseQuery->whereYear('reporting_month_year', $request->state_bar_graph_year);
        }
        if ($request->has('state_bar_graph_month') && $request->state_bar_graph_month) {
            $baseQuery->whereMonth('reporting_month_year', $request->state_bar_graph_month);
        }
    
        // State wise Bar Graph
        $states = State::all();
        $stateBarGraph = [];
        foreach ($states as $state) {
            $totalCount = $baseQuery->clone()->where('state_id', $state->id)->count();
            $stateBarGraph[] = [$state->state_name, $totalCount];
        }
        // End State wise Bar Graph
    
        $states = State::get();
        $totalArv = [];        
        foreach ($states as $state) {
            $totalOpeningBalance = $baseQuery->clone()->where('state_id', $state->id)->sum('dh_of_arv');
            $totalQuantityReceived = $baseQuery->clone()->where('state_id', $state->id)->sum('sdh_of_arv');
            $totalQuantityUtilized = $baseQuery->clone()->where('state_id', $state->id)->sum('chc_of_arv');
            $totalClosingBalance = $baseQuery->clone()->where('state_id', $state->id)->sum('phc_of_arv');
            $totalCount = $totalOpeningBalance + $totalQuantityReceived + $totalQuantityUtilized + $totalClosingBalance;
            $totalArv[] = [$state->state_name, $totalCount];
        }
        
        // Availability of ARS
        $totalArs = [];        
        foreach ($states as $state) {
            $totalOpeningBalance = $baseQuery->clone()->where('state_id', $state->id)->sum('dh_of_ars');
            $totalQuantityReceived = $baseQuery->clone()->where('state_id', $state->id)->sum('sdh_of_ars');
            $totalQuantityUtilized = $baseQuery->clone()->where('state_id', $state->id)->sum('chc_of_ars');
            $totalClosingBalance = $baseQuery->clone()->where('state_id', $state->id)->sum('phc_of_ars');
            $totalCount = $totalOpeningBalance + $totalQuantityReceived + $totalQuantityUtilized + $totalClosingBalance;
            $totalArs[] = [$state->state_name, $totalCount];
        }

        // State wise Patient Report
        $queryPatient = StateMonthlyReport::query();
        if ($request->has('state_bar_graph_year_patient') && $request->state_bar_graph_year_patient) {
            $queryPatient->whereYear('reporting_month_year', $request->state_bar_graph_year_patient);
        }
        if ($request->has('state_bar_graph_month_patient') && $request->state_bar_graph_month_patient) {
            $queryPatient->whereMonth('reporting_month_year', $request->state_bar_graph_month_patient);
        }
        $statePatientReport = [];
        foreach ($states as $state) {
            $totalPatientCount = $queryPatient->clone()->where('state_id', $state->id)->count();
            $totalPatientPrecentage = round(($totalPatientCount/$totalStates)*100, 1);
            $totalPatientPrecentageNot = 100-$totalPatientPrecentage;
            $stateName = strtoupper(str_replace('in-','',$state->state_code));
            $statePatientReport[] = [
                'state_name' => $stateName,
                'total_patient_precentage' => $totalPatientPrecentage,
                'total_patient_precentage_not' => $totalPatientPrecentageNot,
            ];
            $statePatientReportMap[] = [
                'hc-key' => $state->state_name,
                'value' => $totalPatientPrecentage,
                // 'total_patient_precentage_not' => $totalPatientPrecentageNot,
            ];
        }
        //  End State wise Patient Report

        return response()->json([
            'stateBarGraph' => $stateBarGraph,
            'totalArv' => $totalArv,
            'totalArs' => $totalArs,
            'statePatientReport' => $statePatientReport,
            'statePatientReportMap' => $statePatientReportMap,
        ], 200);
    }
    
    /**
     * misReportGenerate
     *
     * @return void
     */
    public function misReportGenerate()
    {
        $states = State::get();
        $months = [];
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-01-01");
            $month->modify("+$m months");
            $months[] = $month->format('F');
        }
        $stateMonthlyReports = StateMonthlyReport::get();
        return view('mis-report-generate', compact('states','months','stateMonthlyReports'));
    }
    
    public function nationalMisExport(Request $request)
    {
        // dd($request->all());
        $fileName = '';
        $query = null;
        $fileName = 'StateMonthlyReport';
        $query = StateMonthlyReport::query();

        if (!empty($request->state)) {
            $query->where('state_id', $request->state);
        }
        if (!empty($request->year)) {
            $query->whereYear('reporting_month_year', $request->year);
        }
        if (!empty($request->month)) {
            $query->whereMonth('reporting_month_year', $request->month);
        }
        $arrays = [$query->get()->toArray()];
        return Excel::download(new StateMonthlyReportExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }
    
    public function labDashboard(Request $request)
    {
        $EquipmentsTotal = Equipments::where('user_id', Auth::id())->where('soft_delete',0)->count();
        $ExpenditureTotal = Expenditure::where('user_id', Auth::id())->where('soft_delete',0)->count();
        $GeneralProfileTotal = GeneralProfile::where('user_id', Auth::id())->where('soft_delete',0)->count();
        $QualityAssuranceTotal = QualityAssurance::where('user_id', Auth::id())->where('soft_delete',0)->count();
        $RabiesTestTotal = RabiesTest::where('user_id', Auth::id())->where(['soft_delete' => 0,'institute_id' => Auth::user()->lab_id])->count();
        
        return view('lab-dashboard',['EquipmentsTotal'=>$EquipmentsTotal,'ExpenditureTotal'=>$ExpenditureTotal,
        'GeneralProfileTotal'=>$GeneralProfileTotal,
        'QualityAssuranceTotal'=>$QualityAssuranceTotal,'RabiesTestTotal'=>$RabiesTestTotal]);
    }
    public function pformView()
    {
        return view("form.pform");
    }
    public function sformView()

    {
        return view("form.sform");
    }

    public function patientrecordsform()
    {
        return view("form.patient_records_form");
    }
    /*dashboard form filter*/
    public function getFilterData(Request $request)
    {
        $array = null;
        $state = null;
        $setstateMap = null;
        $filter_session = $request->session_value ?? '';
        $filter_state = $request->setstate ?? '';
        $filter_district = $request->district ?? '';
        $filter_from_year = $request->setyear ?? '';
        $filter_to_year = $request->setyearto ?? '';
        $filter_form = $request->form_type ?? '';
        $filter_diseasesSyndromes = $request->filter_diseasesSyndromes ?? '';
        $l_dropdown = $request->l_dropdown ?? '';

        $directory = public_path('state');
        $files = File::files($directory);

        $imageNames = [];
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $imageNameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
            $imageNames[] = $imageNameWithoutExtension;
        }


        //sform
        if ($request->form_type == 3) {

            try {
                $human_rabies_case = 0;
                $human_rabies_deaths = 0;
                $animal_bite_query = DB::table('animalbite_dog_sform_bite');
                $total_cases = $animal_bite_query->sum('cases');
                $total_deaths = $animal_bite_query->sum('deaths');
                if (!empty($request->setstate)) {
                    $state = DB::table('states')->where('state_name', '=', $filter_state)->get()->toArray();
                    $district_list = DB::table('district')->where('state_name', '=', $filter_state)->get()->toArray();
                    $animal_bite_query->where('state_id', $state[0]->id);
                    $human_rabies_case = $animal_bite_query->where('state_name', '=', $filter_state)->sum('cases');
                    $human_rabies_deaths = $animal_bite_query->where('state_name', '=', $filter_state)->sum('deaths');
                } else {
                    $state = DB::table('states')->get();
                }
                if (!empty($request->setyear) && !empty($request->setyearto)) {
                    $human_rabies_case = $animal_bite_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('cases');
                    $human_rabies_deaths = $animal_bite_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('deaths');
                } else {
                    if (!empty($request->setyear)) {
                        $human_rabies_case = $animal_bite_query->where('year', '=', $filter_from_year)->sum('cases');
                        $human_rabies_deaths = $animal_bite_query->where('year', '=', $filter_from_year)->sum('deaths');
                    }
                }
                if (!empty($request->district)) {
                    $animal_bite_query->where('district_id',  $filter_district);
                    $human_rabies_case = $animal_bite_query->where('district_id',  $filter_district)->sum('cases');
                    $human_rabies_deaths = $animal_bite_query->where('district_id',  $filter_district)->sum('deaths');
                }
                $case_type = 'cases';
                if ($filter_session == 1) {
                    $case_type = 'deaths';
                }

                if (!empty($request->district) &&  !empty($request->setstate)) {
                    foreach ($district_list as $key => $value) {
                        if ($value->id == $request->district) {
                            $query = clone $animal_bite_query;
                            $human_rabies = DB::table($table_name)->where('district_id', $value->id)->where('year', date('Y') - 2)->sum($case_type);
                            $array[$value->district_name] = $human_rabies;
                            $setstateMap =  $request->setstate;
                        }
                    }
                } else if ($request->setstate) {
                    foreach ($district_list as $key => $value) {
                        $query = clone $animal_bite_query;
                        $human_rabies = DB::table($table_name)->where('district_id', $value->id)->where('year', date('Y') - 2)->sum($case_type);
                        $array[$value->district_name] = $human_rabies;
                        $setstateMap =  $request->setstate;
                    }
                } else {
                    foreach ($state as $key => $value) {
                        $query = clone $animal_bite_query;
                        $human_rabies = $query->where('state_id', $value->id)->sum($case_type);
                        $array[$value->state_name] = $human_rabies;
                    }
                }

                $total_records[] = [
                    'year' => $request->setyear,
                    'case' => $human_rabies_case,
                    'death' => $human_rabies_deaths,
                    'value' => 'sformValue'
                ];

                return response()->json(['total_records'=>$total_records, 'setstateMap' => $setstateMap, 'imageNames' => $imageNames, 'array' => $array, 'total_cases' => $total_cases, 'total_deaths' => $total_deaths, 'human_rabies_deaths' => $human_rabies_deaths, 'human_rabies_case' => $human_rabies_case], 200);

            } catch (QueryException $e) {

                return response()->json(['error' => 'Database error'], 500);
            } catch (\Exception $e) {

                return response()->json(['error' => 'Something went wrong'], 500);
            }

            //lform
        } else if ($request->form_type == 1) {

            // try {

                $human_rabies_case = 0;
                $human_rabies_deaths = 0;
                $laboratory_case_query = DB::table('laboratory_case_lform_state_wise');
                $total_persons = $laboratory_case_query->sum('persons_tested');
                $total_samples = $laboratory_case_query->sum('samples_tested');
                $total_positive = $laboratory_case_query->sum('Positive_tested');

                if (!empty($request->setstate)) {
                    $state = DB::table('states')->where('state_name', '=', $filter_state)->get()->toArray();
                    $district_list = DB::table('district')->where('state_name', '=', $filter_state)->get()->toArray();
                    $laboratory_case_query->where('state_id', $state[0]->id);
                    $laboratory_total = $laboratory_case_query->where('state_name', '=', $filter_state)->sum('persons_tested');
                    $laboratory_samples = $laboratory_case_query->where('state_name', '=', $filter_state)->sum('samples_tested');
                    $laboratory_Positive = $laboratory_case_query->where('state_name', '=', $filter_state)->sum('Positive_tested');
                } else {
                    $state = DB::table('states')->get();
                }

                if (!empty($request->setyear) && !empty($request->setyearto)) {

                    $laboratory_total = $laboratory_case_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('persons_tested');
                    $laboratory_samples = $laboratory_case_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('samples_tested');
                    $laboratory_Positive = $laboratory_case_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('Positive_tested');
                } else {
                    if (!empty($request->setyear)) {
                        $laboratory_total = $laboratory_case_query->where('year', '=', $filter_from_year)->sum('persons_tested');
                        $laboratory_samples = $laboratory_case_query->where('year', '=', $filter_from_year)->sum('samples_tested');
                        $laboratory_Positive = $laboratory_case_query->where('year', '=', $filter_from_year)->sum('Positive_tested');
                    }
                }

                if (!empty($request->district)) {
                    $laboratory_case_query->where('district_id', '=', $filter_district);
                    $laboratory_total = $laboratory_case_query->where('state_name', '=', $filter_state)->sum('persons_tested');
                    $laboratory_samples = $laboratory_case_query->where('state_name', '=', $filter_state)->sum('samples_tested');
                    $laboratory_Positive = $laboratory_case_query->where('state_name', '=', $filter_state)->sum('Positive_tested');
                }

                $case_type = "";
                $case_type_col = 1;
                if ($l_dropdown == "sample_tested") {
                    $case_type = 'samples_tested';
                    $case_type_col = 2;
                } else if ($l_dropdown == "positive_tested") {
                    $case_type = 'Positive_tested';
                    $case_type_col = 3;
                } else {
                    $case_type = 'persons_tested';
                    $case_type_col = 1;
                }


                if (!empty($request->district) &&  !empty($request->setstate)) {

                    foreach ($district_list as $key => $value) {
                        if ($value->id == $request->district) {
                            $query = clone $laboratory_case_query;
                            $human_rabies = DB::table($table_name)->where('district_id', $value->id)->where('year', date('Y') - 2)->sum($case_type);
                            $array[$value->district_name] = $human_rabies;
                            $setstateMap =  $request->setstate;
                        }
                    }
                } else if ($request->setstate) {
                    foreach ($district_list as $key => $value) {
                        $query = clone $laboratory_case_query;
                        $human_rabies = DB::table($table_name)->where('district_id', $value->id)->where('year', date('Y') - 2)->sum($case_type);
                        $array[$value->district_name] = $human_rabies;
                        $setstateMap =  $request->setstate;
                    }
                } else {
                    foreach ($state as $key => $value) {
                        $query = clone $laboratory_case_query;
                        $human_rabies = $query->where('state_id', $value->id)->sum($case_type);
                        $array[$value->state_name] = $human_rabies;
                    }
                }

                $total_records[] = [
                    'year' => $request->setyear,
                    'case' => $laboratory_samples,
                    'death' => $laboratory_Positive,
                    'value' => 'lformValue'
                ];

                return response()->json(['total_records'=>$total_records,'setstateMap' => $setstateMap, 'imageNames' => $imageNames, 'laboratory_total' => $laboratory_total, 'laboratory_samples' => $laboratory_samples, 'laboratory_Positive' => $laboratory_Positive, 'array' => $array, 'total_persons' => $total_persons, 'total_samples' => $total_samples, 'total_positive' => $total_positive, 'human_rabies_deaths' => $human_rabies_deaths, 'human_rabies_case' => $human_rabies_case, 'case_type_col' => $case_type_col], 200);
            // } catch (QueryException $e) {

            //     return response()->json(['error' => 'Database error'], 500);
            // } catch (\Exception $e) {

            //     return response()->json(['error' => 'Something went wrong'], 500);
            // }

            //p form
        } else {
            try {
                $table_name = !empty($filter_diseasesSyndromes) && $filter_diseasesSyndromes === "animal_bite"
                    ? "dog_bite_pform_cases_districtwise"
                    : "pform_human_rabies";
            
                $human_rabies_case_query = DB::table($table_name);
                $age_group_query = DB::table('age_group_pform_dogbite_cases');
                $total_cases = $human_rabies_case_query->sum('cases');
                $total_deaths = $human_rabies_case_query->sum('deaths');
                $age_groups_data = DB::table('age_group_pform_dogbite_cases');
            
                $state = !empty($request->setstate) 
                    ? DB::table('states')->where('state_name', '=', $filter_state)->get()->toArray()
                    : DB::table('states')->get();
                $district_list = !empty($request->setstate) 
                    ? DB::table('district')->where('state_name', '=', $filter_state)->get()->toArray()
                    : [];
            
                if (!empty($request->setstate)) {
                    $state_id = $state[0]->id;
                    $human_rabies_case_query->where('state_id', $state_id);
                    $age_groups_data->where('state_id', $state_id);
                    
                    $human_rabies_case = $human_rabies_case_query->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->sum('deaths');
                    $dogbite_cases_male = $age_group_query->where('state_id', $state_id)->sum('male_case');
                    $dogbite_cases_female = $age_group_query->where('state_id', $state_id)->sum('female_case');
                    $dogbite_cases_male_death = $age_group_query->where('state_id', $state_id)->sum('male_death');
                    $dogbite_cases_female_death = $age_group_query->where('state_id', $state_id)->sum('female_death');
                }
            
                if (!empty($request->setyear) && !empty($request->setyearto)) {
                    $year_range = [$filter_from_year, $filter_to_year];
                    $human_rabies_case_query->whereBetween('year', $year_range);
                    $age_groups_data->whereBetween('year', $year_range);
                    
                    $human_rabies_case = $human_rabies_case_query->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->sum('deaths');
                    $dogbite_cases_male = $age_group_query->whereBetween('year', $year_range)->sum('male_case');
                    $dogbite_cases_female = $age_group_query->whereBetween('year', $year_range)->sum('female_case');
                    $dogbite_cases_male_death = $age_group_query->whereBetween('year', $year_range)->sum('male_death');
                    $dogbite_cases_female_death = $age_group_query->whereBetween('year', $year_range)->sum('female_death');
                } else if (!empty($request->setyear)) {
                    $human_rabies_case_query->where('year', '=', $filter_from_year);
                    $age_groups_data->where('year', '=', $filter_from_year);
                    
                    $human_rabies_case = $human_rabies_case_query->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->sum('deaths');
                    $dogbite_cases_male = $age_group_query->where('year', '=', $filter_from_year)->sum('male_case');
                    $dogbite_cases_female = $age_group_query->where('year', '=', $filter_from_year)->sum('female_case');
                    $dogbite_cases_male_death = $age_group_query->where('year', '=', $filter_from_year)->sum('male_death');
                    $dogbite_cases_female_death = $age_group_query->where('year', '=', $filter_from_year)->sum('female_death');
                }
            
                if (!empty($request->district)) {
                    $human_rabies_case = $human_rabies_case_query->where('district_id', $filter_district)->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->where('district_id', $filter_district)->sum('deaths');
                }
            
                $case_type = $filter_session == 1 ? 'deaths' : 'cases';
                $array = [];
            
                if (!empty($request->district) && !empty($request->setstate)) {
                    foreach ($district_list as $value) {
                        if ($value->id == $request->district) {
                            $query = clone $human_rabies_case_query;
                            $human_rabies = DB::table($table_name)->where('district_id', $value->id)->where('year', date('Y') - 2)->sum($case_type);
                            $array[$value->district_name] = $human_rabies;
                            $setstateMap = $request->setstate;
                        }
                    }
                } else if (!empty($request->setstate)) {
                    foreach ($district_list as $value) {
                        $human_rabies = DB::table($table_name)->where('district_id', $value->id)->where('year', date('Y') - 2)->sum($case_type);
                        $array[$value->district_name] = $human_rabies;
                        $setstateMap = $request->setstate;
                    }
                } else {
                    foreach ($state as $value) {
                        $query = clone $human_rabies_case_query;
                        $human_rabies = $query->where('state_id', $value->id)->sum($case_type);
                        $array[$value->state_name] = $human_rabies;
                    }
                }

                // this is for google chart
                $total = ($dogbite_cases_male +  $dogbite_cases_female);
                if ($total > 0) {
                    $male_percentage = ($dogbite_cases_male / $total) * 100;
                    $female_percentage = ($dogbite_cases_female / $total) * 100;
                } else {
                    $male_percentage = 0;
                    $female_percentage = 0;
                }
                //deaths
                $total_death_google_graph = ($dogbite_cases_male_death +  $dogbite_cases_female_death);
                if ($total_death_google_graph > 0) {
                    $male_percentage_death = ($dogbite_cases_male_death / $total_death_google_graph) * 100;
                    $female_percentage_death = ($dogbite_cases_female_death / $total_death_google_graph) * 100;
                } else {
                    $male_percentage_death = 0;
                    $female_percentage_death = 0;
                }

                /*pyramid code*/
                $ageGroups = $age_groups_data->selectRaw('age, sum(male_case) as male_case, sum(female_case) as female_case,sum(male_death) as male_death, sum(female_death) as female_death ')
                    ->groupBy('age')
                    ->get();

                $responseData = [];
                foreach ($ageGroups as $ageGroup) {
                    $total_cases = $ageGroup->male_case + $ageGroup->female_case;
                    $total_death = $ageGroup->male_death + $ageGroup->female_death;
                    if ($total_cases > 0) {
                        $male_percentage = ($ageGroup->male_case / $total_cases) * 100;
                        $female_percentage = ($ageGroup->female_case / $total_cases) * 100;
                    } else {
                        $male_percentage = 0;
                        $female_percentage = 0;
                    }

                    if ($total_death > 0) {
                        $male_death_percentage = ($ageGroup->male_death / $total_death) * 100;
                        $female_death_percentage = ($ageGroup->female_death / $total_death) * 100;
                    } else {
                        $male_death_percentage = 0;
                        $female_death_percentage = 0;
                    }

                    $responseData[] = [
                        'pyramid_age_group' => $ageGroup->age,
                        'pyramid_male_percentage' => round($male_percentage, 2),
                        'pyramid_female_percentage' => round($female_percentage, 2),
                        'pyramid_male_death_percentage' => round($male_percentage, 2),
                        'pyramid_female_death_percentage' => round($female_percentage, 2)

                    ];
                }


                    $total_records[] = [
                        'year' => $request->setyear,
                        'case' => $human_rabies_case,
                        'death' => $human_rabies_deaths,
                        'value' => 'pformValue'
                    ];
                return response()->json(['total_records' => $total_records, 'setstateMap' => $setstateMap, 'imageNames' => $imageNames, 'array' => $array, 'total_cases' => $total_cases, 'total_deaths' => $total_deaths, 'human_rabies_deaths' => $human_rabies_deaths, 'human_rabies_case' => $human_rabies_case, 'male_percentage' => round($male_percentage, 2), 'female_percentage' => round($female_percentage, 2), 'total' => $total, $responseData, 'male_percentage_death' => $male_percentage_death, 'female_percentage_death' => $female_percentage_death, 'total_death_google_graph' => $total_death_google_graph], 200);
            } catch (QueryException $e) {

                return response()->json(['error' => 'Database error'], 500);
            } catch (\Exception $e) {

                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }
    }


    /*end*/


    //p form
    public function humanRabiesMap(Request $request)
    {
        $currentYear = date('Y');
       // dd($currentYear);
        $previousYear = $currentYear - 2;

        $total_cases = DB::table('pform_human_rabies')->where('year', $previousYear)->sum('cases');
        $total_deaths = DB::table('pform_human_rabies')->where('year', $previousYear)->sum('deaths');


        $states = DB::table('states')->get();
        $human_rabiess = DB::table('pform_human_rabies')->get();
        $currentYear = date('Y');
        $previousYear = $currentYear - 2;

        $total_human_rabies = 0; // Initialize a variable to hold the total
        $total_rabies_record = 0;
        $array = [];
        foreach ($states as $value) {
            if ($request->setyear != '') {
                $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $request->setyear)->sum('cases');
                $human_rabies_record = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $request->setyear)->sum('deaths');
            } else {
                $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $previousYear)->sum('cases');
                $human_rabies_record = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $request->setyear)->sum('deaths');
            }

            $total_human_rabies += $human_rabies; // Accumulate the sum
            $total_rabies_record += $human_rabies_record;
            $array[$value->state_name] = $human_rabies;
        }

        // this is for google chart
        $dogbite_cases_male = DB::table('age_group_pform_dogbite_cases')->sum('male_case');
        $dogbite_cases_female = DB::table('age_group_pform_dogbite_cases')->sum('female_case');
        $total = ($dogbite_cases_male +  $dogbite_cases_female);
        $male_percentage = ($dogbite_cases_male / $total) * 100;
        $female_percentage = ($dogbite_cases_female / $total) * 100;
        //deaths
        $dogbite_cases_male_death = DB::table('age_group_pform_dogbite_cases')->sum('male_death');
        $dogbite_cases_female_death = DB::table('age_group_pform_dogbite_cases')->sum('female_death');
        $total_death_google_graph = ($dogbite_cases_male_death +  $dogbite_cases_female_death);
        $male_percentage_death = ($dogbite_cases_male_death / $total_death_google_graph) * 100;
        $female_percentage_death = ($dogbite_cases_female_death / $total_death_google_graph) * 100;
        return response()->json([
            'array' => $array, 'total_cases' => $total_cases, 'total_deaths' => $total_deaths, 'total_rabies_record' => $total_rabies_record, 'human_rabies_record' => $human_rabies_record, 'dogbite_cases_male' => $dogbite_cases_male, 'dogbite_cases_female' => $dogbite_cases_female, 'total' => $total, 'male_percentage' => $male_percentage, 'female_percentage' => $female_percentage,
            'male_percentage_death' => $male_percentage_death, 'female_percentage_death' => $female_percentage_death, 'total_death_google_graph' => $total_death_google_graph
        ], 201);
    }

    public function humanRabiesDeath(Request $request)
    {
        //dd($request->all());
        $states = DB::table('states')->get();
        $statess = DB::table('states')->where('state_name', '=', $request->name)->first();
        //dd($statess);
        $human_rabiess = DB::table('pform_human_rabies')->get();
        $currentYear = date('Y');
        $previousYear = $currentYear - 2;
        //total death
        $total_human_rabies_deaths = 0; // Initialize a variable to hold the total
        $array1 = [];
        foreach ($states as $value) {
            if ($request->setyear != '') {
                $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $statess->id)->where('state_id', $value->id)->where('year', $request->setyear)->sum('deaths');
                return response()->json(['human_rabies_deaths' => $human_rabies_deaths], 201);
            } else {
                $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $statess->id)->where('state_id', $value->id)->where('year', $previousYear)->sum('deaths');
                return response()->json(['human_rabies_deaths' => $human_rabies_deaths], 201);
            }
        }
    }

    public function humanRabiesDeathdefault()
    {
        $states = DB::table('states')->get();
        $currentYear = date('Y');
        $previousYear = $currentYear - 2;
        //total case 2022
        $total_human_rabies_deaths = 0; // Initialize a variable to hold the total
        foreach ($states as $value) {
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $previousYear)->sum('deaths');
            $state_deaths[$value->state_name] = $human_rabies_deaths;
            dd($state_deaths);
        }
        return response()->json(['state_deaths' => $state_deaths], 201);
    }

    public function getDistrict(Request $request)
    {
        $district = DB::table('district')->where('state_id', $request->state_id)->get();
        if (!empty($district)) {
            return response()->json([
                'result' => true,
                'message' => 'Successfully',
                'district_list' => $district,
            ], 200);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Not Found',
                'district_list' => $district,
            ], 404);
        }
    }

    public function pFormHorizontalBarChart()
    {
        $ageGroups = DB::table('age_group_pform_dogbite_cases')->selectRaw('age, sum(male_case) as male_case, sum(female_case) as female_case')
            ->groupBy('age')
            ->get();
        foreach ($ageGroups as $ageGroup) {

            $total_cases = $ageGroup->male_case + $ageGroup->female_case;
            if ($total_cases > 0) {
                $male_percentage = ($ageGroup->male_case / $total_cases) * 100;
                $female_percentage = ($ageGroup->female_case / $total_cases) * 100;
            } else {
                $male_percentage = 0;
                $female_percentage = 0;
            }

            $responseData[] = [
                'pyramid_age_group' => $ageGroup->age,
                'pyramid_male_percentage' => round($male_percentage, 2),
                'pyramid_female_percentage' => round($female_percentage, 2)
            ];
        }
        return response()->json($responseData);
    }

    public function pFormHorizontalBarChartDeath()
    {
        $ageGroups = DB::table('age_group_pform_dogbite_cases')->selectRaw('age, sum(male_death) as male_death, sum(female_death) as female_death')
            ->groupBy('age')
            ->get();

        foreach ($ageGroups as $ageGroup) {
            $total_cases = $ageGroup->male_death + $ageGroup->female_death;
            if ($total_cases > 0) {
                $male_percentage = ($ageGroup->male_death / $total_cases) * 100;
                $female_percentage = ($ageGroup->female_death / $total_cases) * 100;
            } else {
                $male_percentage = 0;
                $female_percentage = 0;
            }

            $responseData[] = [
                'pyramid_age_group' => $ageGroup->age,
                'pyramid_male_death_percentage' => round($male_percentage, 2),
                'pyramid_female_death_percentage' => round($female_percentage, 2)
            ];
        }
        return response()->json($responseData);
    }


    public function stateMap()
    {
        $directory = public_path('state'); // Path to the "state" directory within the "public" folder
        $files = File::files($directory);

        $imageNames = [];
        foreach ($files as $file) {
            $imageNames[] = $file->getFilename();
        }
    }

    public function pFormHighChart()
    {

        $uniqueYears = DB::table('pform_human_rabies')
                        ->distinct()
                        ->orderBy('year', 'asc')
                        ->pluck('year');

        $total_records = [];
        foreach ($uniqueYears as $year) {
            $case = DB::table('pform_human_rabies')->where('year', $year)->sum('cases');
            $death = DB::table('pform_human_rabies')->where('year', $year)->sum('deaths');

            $total_records[] = [
                'year' => $year,
                'case' => $case,
                'death' => $death,
            ];
        }
        return response()->json($total_records);
    }
}
