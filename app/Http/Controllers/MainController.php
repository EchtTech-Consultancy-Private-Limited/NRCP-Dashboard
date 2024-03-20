<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Hash;
use Redirect;
use File;
use DB;
use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Expenditure;
use App\Models\GeneralProfile;
use App\Models\QualityAssurance;
use App\Models\RabiesTest;

class MainController extends Controller
{
    
    public function dashboard(Request $request)
    {
        return view("dashboard");
    }
    public function labDashboard(Request $request)
    {
        $EquipmentsTotal = Equipments::count();
        $ExpenditureTotal = Expenditure::count();
        $GeneralProfileTotal = GeneralProfile::count();
        $QualityAssuranceTotal = QualityAssurance::count();
        $RabiesTestTotal = RabiesTest::count();
        
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
                            $human_rabies = $query->where('district_id', $value->id)->sum($case_type);
                            $array[$value->district_name] = $human_rabies;
                            $setstateMap =  $request->setstate;
                        }
                    }
                } else if ($request->setstate) {
                    foreach ($district_list as $key => $value) {
                        $query = clone $animal_bite_query;
                        $human_rabies = $query->where('district_id', $value->id)->sum($case_type);
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
                            $human_rabies = $query->where('district_id', $value->id)->sum($case_type);
                            $array[$value->district_name] = $human_rabies;
                            $setstateMap =  $request->setstate;
                        }
                    }
                } else if ($request->setstate) {
                    foreach ($district_list as $key => $value) {
                        $query = clone $laboratory_case_query;
                        $human_rabies = $query->where('district_id', $value->id)->sum($case_type);
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

                $table_name = "pform_human_rabies";
                if (!empty($filter_diseasesSyndromes)  && $filter_diseasesSyndromes === "animal_bite") {
                    $table_name = "dog_bite_pform_cases_districtwise";
                }


                $human_rabies_case = 0;
                $human_rabies_deaths = 0;

                $human_rabies_case_query = DB::table($table_name);
                $age_group_query = DB::table('age_group_pform_dogbite_cases');
                $total_cases = $human_rabies_case_query->sum('cases');
                $total_deaths = $human_rabies_case_query->sum('deaths');
                $age_groups_data = DB::table('age_group_pform_dogbite_cases');


                if (!empty($request->setstate)) {
                    $human_rabies_case = $human_rabies_case_query->where('state_name', '=', $filter_state)->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->where('state_name', '=', $filter_state)->sum('deaths');
                    $state = DB::table('states')->where('state_name', '=', $filter_state)->get()->toArray();
                    $district_list = DB::table('district')->where('state_name', '=', $filter_state)->get()->toArray();
                    $human_rabies_case_query->where('state_id', $state[0]->id);
                    $age_groups_data->where('state_id', $state[0]->id);
                    $dogbite_cases_male = $age_group_query->where('state_id', $state[0]->id)->sum('male_case');
                    $dogbite_cases_female = $age_group_query->where('state_id', $state[0]->id)->sum('female_case');
                    $dogbite_cases_male_death = $age_group_query->where('state_id', $state[0]->id)->sum('male_death');
                    $dogbite_cases_female_death = $age_group_query->where('state_id', $state[0]->id)->sum('female_death');
                } else {
                    $state = DB::table('states')->get();
                }

                if (!empty($request->setyear) && !empty($request->setyearto)) {

                    $human_rabies_case = $human_rabies_case_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('deaths');
                    $dogbite_cases_male = $age_group_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('male_case');
                    $dogbite_cases_female = $age_group_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('female_case');
                    $dogbite_cases_male_death = $age_group_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('male_death');
                    $dogbite_cases_female_death = $age_group_query->whereBetween('year', [$filter_from_year, $filter_to_year])->sum('female_death');
                    $age_groups_data->whereBetween('year', [$filter_from_year, $filter_to_year]);

                } else {
                    if (!empty($request->setyear)) {
                        $human_rabies_case = $human_rabies_case_query->where('year', '=', $filter_from_year)->sum('cases');
                        $human_rabies_deaths = $human_rabies_case_query->where('year', '=', $filter_from_year)->sum('deaths');
                        $dogbite_cases_male = $age_group_query->where('year', '=', $filter_from_year)->sum('male_case');
                        $dogbite_cases_female = $age_group_query->where('year', '=', $filter_from_year)->sum('female_case');
                        $dogbite_cases_male_death = $age_group_query->where('year', '=', $filter_from_year)->sum('male_death');
                        $dogbite_cases_female_death = $age_group_query->where('year', '=', $filter_from_year)->sum('female_death');

                        $age_groups_data->where('year', '=', $filter_from_year);
                    }
                }

                if (!empty($request->district)) {
                    $human_rabies_case = $human_rabies_case_query->where('district_id',  $filter_district)->sum('cases');
                    $human_rabies_deaths = $human_rabies_case_query->where('district_id',  $filter_district)->sum('deaths');
                }

                $case_type = 'cases';
                if ($filter_session == 1) {
                    $case_type = 'deaths';
                }


                if (!empty($request->district) &&  !empty($request->setstate)) {

                    foreach ($district_list as $key => $value) {
                        if ($value->id == $request->district) {
                            $query = clone $human_rabies_case_query;
                            $human_rabies = $query->where('district_id', $value->id)->sum($case_type);
                            $array[$value->district_name] = $human_rabies;
                            $setstateMap = $request->setstate;
                        }
                    }
                } else if ($request->setstate) {

                    foreach ($district_list as $key => $value) {
                        $query = clone $human_rabies_case_query;
                        $human_rabies = $query->where('district_id', $value->id)->sum($case_type);
                        $array[$value->district_name] = $human_rabies;
                        $setstateMap =  $request->setstate;
                    }
                } else {

                    foreach ($state as $key => $value) {
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

        $uniqueYears = DB::table('pform_human_rabies')->distinct()->pluck('year');

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
