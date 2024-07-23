<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CountryState;
use App\Models\City;
use App\Models\SubCity;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\PFormPatientRecord;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PFormPatientRecordImport;
use App\Http\Requests\PFormPatientRecordRequest;

class PFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countryes = Country::get();
        $states = CountryState::orderBy('name','asc')->get();
        $pForms = PFormPatientRecord::with('city')
                ->where('form_type', 'p_form')
                ->orderBy('created_at', 'desc')
                ->get();
        return view("form.pform",compact('countryes','states','pForms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PFormPatientRecordRequest $request)
    {
        try{
            DB::beginTransaction();
            PFormPatientRecord::Create([
                'country_code' => $request->country_code,
                'citizenship' => $request->citizenship,
                'pform_state' => $request->pform_state,
                'pform_city' => $request->pform_city,
                'mobile_number' => $request->mobile_number,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'birth_of_date' => $request->birth_of_date,
                'gender' => $request->gender,
                'id_type' => $request->id_type,
                'identification_number' => $request->identification_number,
                'taluka' => $request->taluka,
                'village' => $request->village,
                'house_no' => $request->house_no,
                'street_name' => $request->street_name,
                'landmark' => $request->landmark,
                'pincode' => $request->pincode,
                'provisinal_diagnosis' => $request->provisinal_diagnosis,
                'date_of_onset' => $request->date_of_onset,
                'opd_ipd' => $request->opd_ipd,
                'test_suspected' => $request->test_suspected,
                'type_of_sample' => $request->type_of_sample,
                'test_resquested' => $request->test_resquested,
                'sample_date' => $request->sample_date,
                'form_type' => $request->form_type,
            ]);
            DB::commit();
            return redirect()->route('pform.index')->with('message', 'P & Form Add SuccessFull !');
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }    

    public function pform(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf'
        ]);
        Excel::import(new PFormPatientRecordImport, $request->file('file'));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PFormPatientRecordRequest $request, $id = '')
    {
        try {
            PFormPatientRecord::where('id', $id)->update([
                'country_code' => $request->country_code,
                'citizenship' => $request->citizenship,
                'pform_state' => $request->pform_state,
                'pform_city' => $request->pform_city,
                'mobile_number' => $request->mobile_number,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'birth_of_date' => $request->birth_of_date,
                'gender' => $request->gender,
                'id_type' => $request->id_type,
                'identification_number' => $request->identification_number,
                'taluka' => $request->taluka,
                'village' => $request->village,
                'house_no' => $request->house_no,
                'street_name' => $request->street_name,
                'landmark' => $request->landmark,
                'pincode' => $request->pincode,
                'provisinal_diagnosis' => $request->provisinal_diagnosis,
                'date_of_onset' => $request->date_of_onset,
                'opd_ipd' => $request->opd_ipd,
                'test_suspected' => $request->test_suspected,
                'type_of_sample' => $request->type_of_sample,
                'test_resquested' => $request->test_resquested,
                'sample_date' => $request->sample_date,
                'form_type' => $request->form_type,
            ]);
            DB::commit();
            return redirect()->route('pform.index')->with('message', 'P & Form Update SuccessFull !');
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id = '')
    {
        $pformDelete = PFormPatientRecord::where('id', $id)->delete();
        if($pformDelete){
            return redirect()->route('pform.index')->with('message', 'P & Form Delete SuccessFull !');
        }
    }

   /**
     * @getCityByStateId
     *
     * @param  mixed  $request
     * @return void
     */
    public function getCityByStateId(Request $request)
    {
        $cityOption = '';
        $cities = City::where('state_id', $request->state_id)->get();
        foreach ($cities as $city) {
            $cityOption .= '<option value="' . $city->id . '">' . ucwords($city->name) . '</option>';
        }
        return response()->json($cityOption);
    }
        
    /**
     * getSubDistrict
     *
     * @param  mixed $request
     * @return void
     */
    public function getSubDistrict(Request $request)
    {
        $subCityOption = '';
        $subCities = SubCity::where('district_id', $request->district_id)->get();
        foreach ($subCities as $subCitie) {
            $subCityOption .= '<option value="' . $subCitie->id . '">' . ucwords($subCitie->name) . '</option>';
        }
        return response()->json($subCityOption);
    }
}
