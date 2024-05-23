<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StateUserLForm;
use App\Models\StateUserLFormCountCase;
use App\Models\CountryState;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * lFormList
     *
     * @return void
     */
    public function lFormList()
    {
        $stateUserLForms = StateUserLForm::with(['stateUserLFormCountCase.states', 'stateUserLFormCountCase.city'])
        ->orderBy('id', 'desc')
        ->get();
        return view('state-user.lform.list',compact('stateUserLForms'));
    }

    /**
     * lFormList
     *
     * @return void
     */
    public function lFormCreate()
    {
        $states = CountryState::get();
        $cities = City::get();
        return view('state-user.lform.create',compact('states','cities'));
    }
    
    /**
     * @lFormstore
     *
     * @param  mixed $request
     * @return void
     */
    public function lFormstore(Request $request)
    {
        $request->validate([
            'name_nodal_person' => 'required',
            'designation_nodal_person' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'institute_name' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $LFormId = StateUserLForm::Create([
                'current_date' => $request->current_date,
                'name_nodal_person' => $request->name_nodal_person,
                'designation_nodal_person' => $request->designation_nodal_person,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'institute_name' => $request->institute_name,
            ])->id;
            foreach($request->row_count as $key => $value){
                StateUserLFormCountCase::Create([
                    'state_user_l_forms_id' => $LFormId,
                    'fname' => $request->fname[$key],
                    'mname' => $request->mname[$key],
                    'lname' => $request->lname[$key],
                    'age' => $request->age[$key],
                    'sex' => $request->sex[$key],
                    'contact_number' => $request->contact_number[$key],
                    'lform_state_id' => $request->lform_state[$key],
                    'lform_district_id' => $request->lform_district[$key],
                    'lform_subdistrict' => $request->lform_subdistrict[$key],
                    'lform_village' => $request->lform_village[$key],
                    'lform_biting_animal' => $request->lform_biting_animal[$key],
                    'lform_speciman_type' => $request->lform_speciman_type[$key],
                    'lform_speciman_detail' => $request->lform_speciman_detail[$key],
                    'lform_sample_collection_date' => $request->lform_sample_collection_date[$key],
                    'number_of_test_performed' => $request->number_of_test_performed[$key],
                    'lform_result' => $request->lform_result[$key],
                    'lform_result_declaration_date' => $request->lform_result_declaration_date[$key],
                    'lform_remark' => $request->lform_remark[$key],
                ]);
            }
            DB::commit();
            return redirect()->route('state.lform-list')->with('message', 'L Form created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
