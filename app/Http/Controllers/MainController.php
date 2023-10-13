<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\patient_record;
use Hash;
use Redirect;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(Request $request)
    {
        $usertype = $request->usertype;

        $states = DB::table('states')->get();
        $human_rabiess = DB::table('pform_human_rabies')->get();

        // --------------------------------------------------------------------------- //total case
        //total case 2020
        $total_human_rabies = 0; // Initialize a variable to hold the total
        foreach ($states as $value) {
            $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', 2020)->sum('cases');
            $state_names = collect($human_rabiess)->where('state_id', $value->id)->pluck('state_name')->unique();
            $total_human_rabies += $human_rabies; // Accumulate the sum
            //dd($total_human_rabies); // This will dump the total number of cases
        }
        // dd($state_names);


        //total case 2021
        $total_human_rabies = 0; // Initialize a variable to hold the total
        foreach ($states as $value) {
            $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', 2021)->sum('cases');
            $state_names = collect($human_rabiess)->where('state_id', $value->id)->pluck('state_name')->unique();
            $total_human_rabies += $human_rabies; // Accumulate the sum
            //dd($total_human_rabies); // This will dump the total number of cases
        }
        //  dd($state_names);


        //total case 2022
        $total_human_rabies = 0; // Initialize a variable to hold the total
        foreach ($states as $value) {
            $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', 2022)->sum('cases');
            $state_names = collect($human_rabiess)->where('state_id', $value->id)->pluck('state_name')->unique();
            $total_human_rabies += $human_rabies; // Accumulate the sum
            //dd($total_human_rabies); // This will dump the total number of cases
        }
        //dd($state_names);



        // --------------------------------------------------------------------------- //


        //total death
        $total_human_rabies_deaths = 0; // Initialize a variable to hold the total
        foreach ($states as $value) {
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $value->id)->sum('deaths');
            $total_human_rabies_deaths += $human_rabies_deaths; // Accumulate the sum
        }
        //dd($total_human_rabies_deaths); // This will dump the total number of cases

        return view("dashboard")->with('usertype', $usertype);

    }

    public function pformView()
    {
        return view("pform");
    }
    public function sformView()

    {
        return view("sform");
    }

    public function HumanRabiesView()
    {
        return view('pformHumanRabies');
    }

    public function login()
    {
        return view("login");
    }

    public function patientAdd(Request $request)
    {

        //dd($request->all());
        $data = new patient_record;
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->birth_date = $request->birth_date;
        $data->gender = $request->gender;
        $data->id_type = $request->id_type;
        $data->identification_number = $request->identification_number;
        $data->citizenship = $request->citizenship;
        $data->state = $request->state;
        $data->district = $request->district;
        $data->taluka = $request->taluka;
        $data->village = $request->village;
        $data->house_no = $request->house_no;
        $data->street_name = $request->street_name;
        $data->Pincode = $request->Pincode;
        $data->date_of_onset = $request->date_of_onset;
        $data->provisinal_diagnosis = $request->provisinal_diagnosis;
        $data->landmark = $request->landmark;
        $data->permanent_address = $request->permanent_address;
        $data->opd_ipd = $request->opd_ipd;
        $data->save();
        return back()->with('message', '');
    }


    //p form
    public function humanRabiesMap(Request $request)
    {
        $states = DB::table('states')->get();
        $human_rabiess = DB::table('pform_human_rabies')->get();
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;
        $type = session('type');

        if ($type != 1) {

            $total_human_rabies = 0; // Initialize a variable to hold the total
            $total_rabies_record=0;
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
        } else {

            $total_human_rabies = 0; // Initialize a variable to hold the total
            $total_rabies_record=0;
            $array = [];
            foreach ($states as $value) {
                if ($request->setyear != '') {
                    $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $request->setyear)->sum('deaths');
                    $human_rabies_record = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $request->setyear)->sum('cases');

                } else {
                    $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $previousYear)->sum('deaths');
                    $human_rabies_record =DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $previousYear)->sum('cases');

                }
                $total_human_rabies += $human_rabies; // Accumulate the sum
                $total_rabies_record += $human_rabies_record;
                $array[$value->state_name] = $human_rabies;
            }
        }

        return response()->json(['array' => $array,'total_rabies_record'=>$total_rabies_record,'human_rabies_record'=>$human_rabies_record], 201);
    }

    public function humanRabiesDeath(Request $request)
    {
        //dd($request->all());
        $states = DB::table('states')->get();
        $statess = DB::table('states')->where('state_name', '=', $request->name)->first();
        //dd($statess);
        $human_rabiess = DB::table('pform_human_rabies')->get();
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;
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
        $previousYear = $currentYear - 1;
        //total case 2022
        $total_human_rabies_deaths = 0; // Initialize a variable to hold the total
        foreach ($states as $value) {
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $previousYear)->sum('deaths');
            $state_deaths[$value->state_name] = $human_rabies_deaths;
            dd($state_deaths);
        }
        return response()->json(['state_deaths' => $state_deaths], 201);
    }

    //state wise
    public function humanRabiesStateWise(Request $request)
    {
        $type = session('type');
        if($type != 1) {
            $state = DB::table('states')->where('state_name', '=', $request->setstate)->first();
            $human_rabies_case = DB::table('pform_human_rabies')->where('state_id', $state->id)->where('year', $request->setyear)->sum('cases');
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $state->id)->where('year', $request->setyear)->sum('deaths');
            return response()->json(['human_rabies_case' => $human_rabies_case, 'human_rabies_deaths' => $human_rabies_deaths, 'state' => $state], 201);

        }else{

            $state = DB::table('states')->where('state_name', '=', $request->setstate)->first();
            $human_rabies_deaths= DB::table('pform_human_rabies')->where('state_id', $state->id)->where('year', $request->setyear)->sum('cases');
            $human_rabies_case = DB::table('pform_human_rabies')->where('state_id', $state->id)->where('year', $request->setyear)->sum('deaths');
            return response()->json(['human_rabies_case' => $human_rabies_case, 'human_rabies_deaths' => $human_rabies_deaths, 'state' => $state], 201);
        }
    }


    public function humanRabiesStateBetween(Request $request)
    {
        $states = DB::table('states')->get();
        $human_rabiess = DB::table('pform_human_rabies')->get();

        $type = session('type');

        if ($type != 1) {
            $state_totals = [];
            foreach ($states as $value) {
                $human_rabies_case = DB::table('pform_human_rabies')->where('state_id', $value->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('cases');
                // $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $value->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('deaths');
                $state_names = collect($human_rabiess)->where('state_id', $value->id)->pluck('state_name')->unique();

                $array[$value->state_name] = $human_rabies_case;
            }
        } else {
            $state_totals = [];
            foreach ($states as $value) {
                $human_rabies_case = DB::table('pform_human_rabies')->where('state_id', $value->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('deaths');
                // $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $value->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('deaths');
                $state_names = collect($human_rabiess)->where('state_id', $value->id)->pluck('state_name')->unique();

                $array[$value->state_name] = $human_rabies_case;
            }
        }
        return response()->json(['array' => $array], 201);
    }


    public function humanRabiesStateYear(Request $request)
    {
        $type = session('type');
        // dd($type == 1);
        if ($type != 1) {
            $state = DB::table('states')->where('state_name', '=', $request->setstate)->first();
            $human_rabies_case = DB::table('pform_human_rabies')->where('state_id', $state->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('cases');
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $state->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('deaths');
        } else {
            $state = DB::table('states')->where('state_name', '=', $request->setstate)->first();
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id', $state->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('cases');
            $human_rabies_case = DB::table('pform_human_rabies')->where('state_id', $state->id)->whereBetween('year', [$request->setyear, $request->setyearto])->sum('deaths');
        }


        return response()->json(['human_rabies_case' => $human_rabies_case, 'human_rabies_deaths' => $human_rabies_deaths, 'state' => $state], 201);
    }

    public function  setSession(Request $request)
    {
        $type = $request->input('type');
        if ($type === '') {
            // If the value is blank, destroy the session
            session()->forget('type');
        } else {
            // If the value is not blank, set it in the session
            session(['type' => $type]);
        }
        return response()->json(['message' => 'Session value set successfully']);
    }

  //monu
    public function googleLineChart()
    {

        $dogbite_cases_male = DB::table('age_group_pform_dogbite_cases')->sum('male');
        $dogbite_cases_female = DB::table('age_group_pform_dogbite_cases')->sum('female');
        $total=($dogbite_cases_male +  $dogbite_cases_female);
        $male_percentage = ($dogbite_cases_male / $total) * 100;
        $female_percentage = ($dogbite_cases_female / $total) * 100;

        return view('googleChart', compact('male_percentage','female_percentage','total'));
    }

    public function horizontalBarChart()
     {
    $age_groups_data = DB::table('age_group_pform_dogbite_cases')
        ->select('age', 'male', 'female')
        ->get();
      //  dd($age_groups_data);

    return view('horizontalBarChart', compact('age_groups_data'));
    }
}
