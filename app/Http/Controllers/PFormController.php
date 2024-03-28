<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CountryState;
use App\Models\City;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\PFormPatientRecord;
use App\Http\Requests\PFormPatientRecordRequest;

class PFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countryes = Country::get();
        $states = CountryState::get();
        $pForms = PFormPatientRecord::get();
        return view("form.pform",compact('countryes','states','pForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        dd($request->all());
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
                'pincode',45 => $request->pincode,
                'provisinal_diagnosis' => $request->provisinal_diagnosis,
                'date_of_onset' => $request->date_of_onset,
                'opd_ipd' => $request->opd_ipd,
                'test_suspected' => $request->test_suspected,
                'type_of_sample' => $request->type_of_sample,
                'test_resquested' => $request->test_resquested,
                'sample_date' => $request->sample_date,
            ]);
            DB::commit();
            return redirect()->route('pform.index')->with('message', 'PForm Add SuccessFull !');
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PFormPatientRecord $id)
    {
        die($id);
        // try{
        //     $pform = PFormPatientRecord::with('country','state','city')->where('id', $id)->first();
        //     $states = CountryState::get();
        //     return view("form.pform",compact('pform','states'));
        // }catch (Exception $e) {
        //     DB::rollBack();
        //     throw new Exception($e->getMessage());
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = '')
    {
        die($id);
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
                'pincode',45 => $request->pincode,
                'provisinal_diagnosis' => $request->provisinal_diagnosis,
                'date_of_onset' => $request->date_of_onset,
                'opd_ipd' => $request->opd_ipd,
                'test_suspected' => $request->test_suspected,
                'type_of_sample' => $request->type_of_sample,
                'test_resquested' => $request->test_resquested,
                'sample_date' => $request->sample_date,
            ]);
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
            return redirect()->route('pform.index')->with('message', 'PForm Delete SuccessFull !');
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
            $cityOption .= '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        return response()->json($cityOption);
    }
}
