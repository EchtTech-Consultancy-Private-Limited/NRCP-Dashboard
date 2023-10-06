<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\patient_record;
use Hash;
use Redirect;
use DB;
use App\Models\sform;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(Request $request)
    {
        $usertype = $request->usertype;
<<<<<<< HEAD
        
        return view("dashboard")->with('usertype',$usertype);
=======
>>>>>>> 5eb8cc3a2b76faafac82fdc139c25f5eaadea7b9


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

    public function pformDashboardview()
    {
        return view('pformDashboard');
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

    public function addpatientdata(Request $req){
        
        $dataRequest=$req->all();

        unset($dataRequest['_token']);


        
        // $sform =new sform();
        $illnessSenario="";

     foreach($dataRequest as $key=>$value){
    
       
        $keyData=(explode('_',$key));
         if( $illnessSenario!=$keyData[0]){
             $sform = new sform();
           }

        $illnessSenario=$keyData[0];
       
        
        $sform->illness_senario=$keyData[0];
    

        if($keyData[5]=="less" && $keyData[3]=="male"){
            $sform->male_less_5_age_illness=$value;
        }


        if($keyData[5]=="greater" && $keyData[3]=="male"){
            $sform->male_greater_5_age_illness=$value;
        

        }

        if($keyData[5]=="less" && $keyData[3]=="female"){
            $sform->female_less_5_age_illness=$value;
        }


        if($keyData[5]=="greater" && $keyData[3]=="female"){
            $sform->female_greater_5_age_illness=$value;
        

        }

        

        $sform->male_total_illness=$sform->male_less_5_age_illness + $sform->male_greater_5_age_illness;

        $sform->female_total_illness=$sform->female_less_5_age_illness + $sform->female_greater_5_age_illness;

        $sform->save();

        
        
        // if(isset($value)){
        // $patientsformdata = sform::create([
        //     'illness_senario' =>$keyData[0],
        //     'age_of_5'=>$ageis5,
        //     'number_of_cases_of_illness'=>$value,
        //     'gender' => $gender,
           

        // ]);
    // }

      

        

     }


     return response()->json(['message'=>"data add successfully"]);

        // explode(“ “, “Hello, what is your name?")
        // for()

        // dd($req->all());

    }


    //p form
    public function humanRabiesMap(Request $request)
    {

        $states = DB::table('states')->get();
        $human_rabiess = DB::table('pform_human_rabies')->get();
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;


        $total_human_rabies = 0; // Initialize a variable to hold the total
        $array = [];
        foreach ($states as $value) {
            if ($request->setyear != ''){
                $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $request->setyear)->sum('cases');
                //dd($human_rabies);
            }else {
                $human_rabies = DB::table('pform_human_rabies')->where('state_id', $value->id)->where('year', $previousYear)->sum('cases');

            }

            $total_human_rabies += $human_rabies; // Accumulate the sum
            $array[$value->state_name] = $human_rabies;
        }

        return response()->json(['array' => $array], 201);
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
            $human_rabies_deaths = DB::table('pform_human_rabies')->where('state_id',$value->id)->where('year',$previousYear)->sum('deaths');
            $state_deaths[$value->state_name] = $human_rabies_deaths;


        }
        return response()->json(['state_deaths' => $state_deaths], 201);
    }
}



/*
   $states = DB::table('states')->get();

        foreach($states as $state){

       $data = DB::table('pform_human_rabies')->where('state_name','=',$state->state_name)->get();


        foreach($data as $item){
            DB::table('pform_human_rabies')
            ->where('state_name','=',$item->state_name)
            ->update(['state_id' =>$state->id ]);
        }

       }
    }



    $states = DB::table('district')->get();

        foreach($states as $state){

       $data = DB::table('animalbite_dog_sform_bite')->where('district_name','=',$state->district_name)->get();

       //dd($data);


       foreach($data as $item){
        if($item->state_id != NUll){
            DB::table('district')
            ->where('district_name','=',$item->district_name)
            ->update(['state_id' =>$item->state_id ]);
        }else{

        }
    }

       }
    }

*/
