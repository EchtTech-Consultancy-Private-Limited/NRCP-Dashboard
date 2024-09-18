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
use App\Services\SendNotificationServices;

class FormController extends Controller
{
    public $SendNotificationServices;

    function __construct()
    {
        $this->SendNotificationServices = new SendNotificationServices;
    }
    /**
     * lFormList
     *
     * @return void
     */
    public function lFormList()
    {
        $stateUserLForms = StateUserLForm::with(['stateUserLFormCountCase.states', 'stateUserLFormCountCase.city'])
        ->where('user_id', Auth::id())
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
        $states = CountryState::orderBy('name','asc')->get();
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
            'name_nodal_person' => ['required', 'regex:/^[a-zA-Z. \'\'-]+$/','min:2', 'max:100'],
            'designation_nodal_person' => 'required','min:2', 'max:150',
            'phone_number' => 'required|unique:state_user_l_forms,phone_number|numeric|digits:10',
            // 'email' => 'required|unique:state_user_l_forms,email',
            'institute_name' => 'required','min:2', 'max:150',
        ],
        [
            'name_nodal_person.required' => 'Name of the nodal person field is required',
            'designation_nodal_person.required' => 'Designation of the nodal person field is required',
            'phone_number.required' => 'Phone number is required',
            // 'email.required' => 'Email address is required',
            // 'email.email' => 'Email address must be a valid email format',
            'institute_name.required' => 'Institute name field is required',
        ]);
        try {
            DB::beginTransaction();
            $LFormId = StateUserLForm::Create([
                'user_id' => Auth::id(),
                'current_date' => $request->current_date,
                'name_nodal_person' => $request->name_nodal_person,
                'designation_nodal_person' => $request->designation_nodal_person,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'institute_name' => $request->institute_name,
                // 'aadhar_number' =>$request->aadhar_number,
            ])->id;
            foreach($request->row_count as $key => $value){
                StateUserLFormCountCase::Create([
                    'state_user_l_forms_id' => $LFormId,
                    'fname' => $request->fname[$key],
                    'mname' => $request->mname[$key],
                    'lname' => $request->lname[$key],
                    'aadhar_number' =>$request->aadhar_no[$key],
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
            $formType = '2'; //Soe Uc Form
            $this->SendNotificationServices->sendNotification($LFormId, $formType, '2', $request->status);
            DB::commit();
            return redirect()->back()->with('message', 'The record has been created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
