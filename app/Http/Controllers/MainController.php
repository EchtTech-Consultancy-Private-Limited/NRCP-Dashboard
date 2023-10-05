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
        
        return view("dashboard")->with('usertype',$usertype);
    }

    public function pformView()
    {
        return view("pform");
    }    
    public function sformView()
    
    {
        return view("sform");
    }


    public function login()
    {
        return view("login");
    }

    public function patientAdd(Request $request){

         //dd($request->all());
        $data=new patient_record;
        $data->first_name=$request->first_name;
        $data->middle_name=$request->middle_name;
        $data->last_name=$request->last_name;
        $data->birth_date=$request->birth_date;
        $data->gender=$request->gender;
        $data->id_type=$request->id_type;
        $data->identification_number=$request->identification_number;
        $data->citizenship=$request->citizenship;
        $data->state=$request->state;
        $data->district=$request->district;
        $data->taluka=$request->taluka;
        $data->village=$request->village;
        $data->house_no=$request->house_no;
        $data->street_name=$request->street_name;
        $data->Pincode=$request->Pincode;
        $data->date_of_onset=$request->date_of_onset;
        $data->provisinal_diagnosis=$request->provisinal_diagnosis;
        $data->landmark=$request->landmark;
        $data->permanent_address=$request->permanent_address;
        $data->opd_ipd=$request->opd_ipd;
        $data->save();
        return back()->with('message','');
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


}
