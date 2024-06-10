<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StateMonthlyReport;
use App\Models\State;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StateMonthlyRequest;
use App\Models\StateUserLForm;
use App\Models\CountryState;
use App\Models\City;
use App\Models\StateUserLFormCountCase;
use App\Models\LineSuspected;
use App\Models\LineSuspectedCalculate;
use App\Models\InvestigateReport;

class NationalStateListController extends Controller
{    
    /**
     * stateMonthlyReport
     *
     * @return void
     */
    public function stateMonthlyReport()
    {
        $stateMonthlyReports = StateMonthlyReport::orderBy('id', 'desc')->get();
        return view('national-state.state-monthly-report.index',compact('stateMonthlyReports'));
    }

    /**
     *  @edit get nhm record for edit
     *
     * @param  mixed $id
     * @return void
     */
    public function stateMonthlyEdit($id){
        try{
            DB::beginTransaction();
            $stateMonthlyReport = StateMonthlyReport::where('id',$id)->first();
            DB::commit();
            return view('national-state.state-monthly-report.edit', compact('stateMonthlyReport'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * update nhms record
     *
     * @param  mixed $id
     * @return void
     */
    public function stateMonthlyUpdate(StateMonthlyRequest $request, $id = ''){
        try{
            DB::beginTransaction();
            StateMonthlyReport::where('id', $id)->Update([
                'state_name' => $request->state_name,
                'state_nodal_office' => $request->state_nodal_office,
                'office_address' => $request->office_address,
                'reporting_month_year' => $request->reporting_month_year,
                'total_districts' => $request->total_districts,
                'total_health_facilities_anaimal_bite' => $request->total_health_facilities_anaimal_bite,
                'total_health_facilities_submitted_monthly' => $request->total_health_facilities_submitted_monthly,
                'total_patients_animal_biting' => $request->total_patients_animal_biting,
                'total_stray_dog_bite' => $request->total_stray_dog_bite,
                'total_pet_dog_bite' => $request->total_pet_dog_bite,
                'total_cat_bite' => $request->total_cat_bite,
                'total_monkey_bite' => $request->total_monkey_bite,
                'total_others_bite' => $request->total_others_bite,
                'mention_patient_cateogry_I' => $request->mention_patient_cateogry_I,
                'mention_patient_cateogry_II' => $request->mention_patient_cateogry_II,
                'mention_patient_cateogry_III' => $request->mention_patient_cateogry_III,
                'rabies_vaccination_im_route' => $request->rabies_vaccination_im_route,
                'rabies_vaccination_id_route' => $request->rabies_vaccination_id_route,
                'rabies_vaccination_III_victim_ars' => $request->rabies_vaccination_III_victim_ars,
                'rabies_vaccination_completed_pep' => $request->rabies_vaccination_completed_pep,
                'confirmed_suspected_rabies_deaths' => $request->confirmed_suspected_rabies_deaths,
                'suspected_rabies_cases_opd' => $request->suspected_rabies_cases_opd,
                'suspected_rabies_cases_admitted' => $request->suspected_rabies_cases_admitted,
                'suspected_rabies_cases_left_against_medical' => $request->suspected_rabies_cases_left_against_medical,
                'suspected_rabies_deaths' => $request->suspected_rabies_deaths,
                'arv_opening_balance' => $request->arv_opening_balance,
                'arv_quantity_received' => $request->arv_quantity_received,
                'arv_quantity_utilized' => $request->arv_quantity_utilized,
                'arv_closing_balance' => $request->arv_closing_balance,
                'shortage_of_arv' => $request->shortage_of_arv,
                'ars_opening_balance' => $request->ars_opening_balance,
                'ars_quantity_recieved' => $request->ars_quantity_recieved,
                'ars_quantity_utilized' => $request->ars_quantity_utilized,
                'ars_closing_balance' => $request->ars_closing_balance,
                'shortage_of_ars' => $request->shortage_of_ars,
                'dh_health_of_health_facilties' => $request->dh_health_of_health_facilties,
                'dh_of_arv' => $request->dh_of_arv,
                'dh_of_ars' => $request->dh_of_ars,
                'sdh_health_of_health_facilties' => $request->sdh_health_of_health_facilties,
                'sdh_of_arv' => $request->sdh_of_arv,
                'sdh_of_ars' => $request->sdh_of_ars,
                'chc_health_of_health_facilties' => $request->chc_health_of_health_facilties,
                'chc_of_arv' => $request->chc_of_arv,
                'chc_of_ars' => $request->chc_of_ars,
                'phc_health_of_health_facilties' => $request->phc_health_of_health_facilties,
                'phc_of_arv' => $request->phc_of_arv,
                'phc_of_ars' => $request->phc_of_ars,
                'bite_cases_shared_department' => $request->bite_cases_shared_department,
                'bite_cases_observed' => $request->bite_cases_observed,
                'other_remarks' => $request->other_remarks,
            ]);
            DB::commit();
            return redirect()->route('national.state-monthly-report')->with('message', 'State Ronthly Report Update SuccessFull !');
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * stateMonthlyView
     *
     * @param  mixed $id
     * @return void
     */
    public function stateMonthlyView($id){
        try{
            DB::beginTransaction();
            $stateMonthlyReport = StateMonthlyReport::where('id',$id)->first();
            DB::commit();
            return view('national-state.state-monthly-report.view', compact('stateMonthlyReport'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function stateMonthlyDestroy($id)
    {
        StateMonthlyReport::where('id', $id)->delete();
        return back()->with(['error'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }

    /**
     * lFormList
     *
     * @return void
     */
    public function lForm()
    {
        $stateUserLForms = StateUserLForm::with(['stateUserLFormCountCase.states', 'stateUserLFormCountCase.city'])
        ->orderBy('id', 'desc')
        ->get();
        return view('national-state.lform.index',compact('stateUserLForms'));
    }

    /**
     *  @edit get lform record for edit
     *
     * @param  mixed $id
     * @return void
     */
    public function lFormEdit($id){
        try{
            DB::beginTransaction();
            $stateUserLForm = StateUserLForm::with(['stateUserLFormCountCase.states', 'stateUserLFormCountCase.city'])->where('id', $id)->first();
            $states = CountryState::get();
            $cities = City::get();
            DB::commit();
            return view('national-state.lform.edit', compact('stateUserLForm','states','cities'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function lFormUpdate(Request $request, $id = '')
    {
        $request->validate([
            'name_nodal_person' => 'required',
            'designation_nodal_person' => 'required',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required', 
            'institute_name' => 'required',
            'aadhar_number' => 'required|numeric|digits:12',
        ]);

        try {
            DB::beginTransaction();

            $LForm = StateUserLForm::findOrFail($id);
            $LForm->update([
                'current_date' => $request->current_date,
                'name_nodal_person' => $request->name_nodal_person,
                'designation_nodal_person' => $request->designation_nodal_person,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'institute_name' => $request->institute_name,
                'aadhar_number' => $request->aadhar_number,
            ]);

            $existingCountCases = $LForm->stateUserLFormCountCase()->get()->keyBy('id')->toArray();
            $newCountCases = [];
            foreach ($request->row_count as $key => $value) {
                $newCountCases[] = [
                    'id' => $request->l_form_count_id[$key] ?? null,
                    'state_user_l_forms_id' => $LForm->id,
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
                ];
            }

            $existingIds = array_keys($existingCountCases);
            $newIds = array_filter(array_column($newCountCases, 'id'));
            $idsToDelete = array_diff($existingIds, $newIds);
            StateUserLFormCountCase::destroy($idsToDelete);
            foreach ($newCountCases as $caseData) {
                if ($caseData['id']) {
                    $countCase = StateUserLFormCountCase::find($caseData['id']);
                    if ($countCase) {
                        $countCase->update($caseData);
                    }
                } else {
                    StateUserLFormCountCase::create($caseData);
                }
            }
            DB::commit();
            return redirect()->route('national.l-form')->with('message', 'L Form updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    
    /**
     * lFormView
     *
     * @param  mixed $id
     * @return void
     */
    public function lFormView($id)
    {
        try{
            DB::beginTransaction();
            $stateUserLForm = StateUserLForm::with(['stateUserLFormCountCase.states', 'stateUserLFormCountCase.city'])->where('id', $id)->first();
            $states = CountryState::get();
            $cities = City::get();
            DB::commit();
            // dd($stateUserLForm);
            return view('national-state.lform.view', compact('stateUserLForm','states','cities'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function lFormDestroy($id)
    {
        StateUserLForm::where('id', $id)->delete();
        StateUserLFormCountCase::where('state_user_l_forms_id', $id)->delete();
        return back()->with(['error'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
    
    /**
     * pForm
     *
     * @return void
     */
    public function pForm()
    {
        $stateUserpForms = LineSuspected::with('lineSuspectedCalculate')->orderBy('id', 'desc')->get();
        return view('national-state.pform.index',compact('stateUserpForms'));
    }

    /**
     *  @edit get lform record for edit
     *
     * @param  mixed $id
     * @return void
     */
    public function pFormEdit($id){
        try{
            DB::beginTransaction();
            $stateUserpForm = LineSuspected::with('lineSuspectedCalculate')->where('id', $id)->first();
            $states = CountryState::get();
            DB::commit();
            return view('national-state.pform.edit', compact('stateUserpForm','states'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * pFormUpdate
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function pFormUpdate(Request $request, $id = '')
    {
        $request->validate([
            'name_of_health' => 'required',
            'address_hospital' => 'required',
            'email' => 'required',
            'aadhar_number' => 'required|numeric|min_digits:12|max_digits:12',
            'type_of_health' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $PForm = LineSuspected::findOrFail($id);
            $PForm->update([
                'suspected_date' => $request->suspected_date,
                'name_of_health' => $request->name_of_health,
                'address_hospital' => $request->address_hospital,
                'designation_name' => $request->designation_name,
                'type_of_health' => $request->type_of_health,
                'email' => $request->email,
                'aadhar_number' => $request->aadhar_number,
            ]);

            $existingCountCases = $PForm->lineSuspectedCalculate()->get()->keyBy('id')->toArray();
            $newCountCases = [];
            foreach ($request->row_count as $index => $value) {
                $newCountCases[] = [
                    'id' => $request->p_form_count_id[$index] ?? null,
                    'line_suspected_form_id' => $PForm->id,
                    'name' => $request->name[$index],
                    'age' => $request->age[$index],
                    'sex' => $request->sex[$index],
                    'contact_number' => $request->contact_number[$index],
                    'village' => $request->village[$index],
                    'sub_district_mandal' => $request->sub_district_mandal[$index],
                    'district' => $request->district[$index],
                    'biting_animal' => $request->biting_animal[$index],
                    'suspected_probable' => $request->suspected_probable[$index],
                    'bit_incidence_village' => $request->bit_incidence_village[$index],
                    'bit_incidence_sub_district' => $request->bit_incidence_sub_district[$index],
                    'bit_incidence_district' => $request->bit_incidence_district[$index],
                    'category_of_bite' => $request->category_of_bite[$index],
                    'status_of_pep' => $request->status_of_pep[$index],
                    'health_facility_name_institute' => $request->health_facility_name_institute[$index],
                    'health_facility_district' => $request->health_facility_district[$index],
                    'outcome_of_patient' => $request->outcome_of_patient[$index],
                    'bite_from_stray' => $request->bite_from_stray[$index],
                    'mobile_number' => $request->mobile_number[$index],
                    'date' => $request->date[$index],
                ];
            }

            $existingIds = array_keys($existingCountCases);
            $newIds = array_filter(array_column($newCountCases, 'id'));
            $idsToDelete = array_diff($existingIds, $newIds);
            LineSuspectedCalculate::destroy($idsToDelete);
            foreach ($newCountCases as $caseData) {
                if ($caseData['id']) {
                    $countCase = LineSuspectedCalculate::find($caseData['id']);
                    if ($countCase) {
                        $countCase->update($caseData);
                    }
                } else {
                    LineSuspectedCalculate::create($caseData);
                }
            }
            DB::commit();
            return redirect()->route('national.p-form')->with('message', 'P Form updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function pFormView($id)
    {
        try{
            DB::beginTransaction();
            $stateUserpForm = LineSuspected::with('lineSuspectedCalculate')->where('id', $id)->first();
            $states = CountryState::get();
            DB::commit();
            return view('national-state.pform.view', compact('stateUserpForm','states'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

        /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function pFormDestroy($id)
    {
        LineSuspected::where('id', $id)->delete();
        LineSuspectedCalculate::where('line_suspected_form_id', $id)->delete();
        return back()->with(['error'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
    
    /**
     * investigateReport
     *
     * @return void
     */
    public function investigateReport()
    {
        $investigateReports = InvestigateReport::orderBy('id', 'desc')->get();
        return view('national-state.investigate-report.index', compact('investigateReports'));
    }
    
    /**
     * investigateReportEdit
     *
     * @param  mixed $id
     * @return void
     */
    public function investigateReportEdit($id)
    {
        try{
            DB::beginTransaction();
            $investigateReport = InvestigateReport::where('id', $id)->first();
            return view('national-state.investigate-report.edit', compact('investigateReport'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * investigateReportUpdate
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function investigateReportUpdate(Request $request, $id)
    {
        $request->validate([
            'interviewer_name' => ['required'],
            'interview_date' => ['required'],
            'interviewer_designation' => ['required'],
            'interviewer_contact_number' => ['required'],
        ]);

        try {
            DB::beginTransaction();
            $investigateReport = InvestigateReport::findOrFail($id);
            $investigateReport->fill($request->all());
            $investigateReport->save();
            DB::commit();
            return redirect()->route('national.investigate-report')->with('message', 'Investigate report updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    
    /**
     * investigateReportView
     *
     * @param  mixed $id
     * @return void
     */
    public function investigateReportView($id)
    {
        try{
            DB::beginTransaction();
            $investigateReport = InvestigateReport::where('id', $id)->first();
            return view('national-state.investigate-report.view', compact('investigateReport'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * investigateReportDestroy
     *
     * @param  mixed $id
     * @return void
     */
    public function investigateReportDestroy($id)
    {
        InvestigateReport::where('id', $id)->delete();
        return back()->with(['error'=>"Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
}
