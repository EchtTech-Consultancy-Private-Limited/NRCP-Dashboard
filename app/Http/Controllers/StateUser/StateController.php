<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StateMonthlyRequest;
use Illuminate\Support\Facades\DB;
use App\Models\StateMonthlyReport;

class StateController extends Controller
{    
    /**
     *  @index state user dashboard
     *
     * @return void
     */
    public function index()
    {
        return view('state-user.dashboard');
    }
    
    /**
     *  @stateMonthlyList get all state month report list
     *
     * @return void
     */
    public function stateMonthlyList()
    {
        $stateMonthlyReports = StateMonthlyReport::orderBy('id', 'desc')->get();
        return view('state-user.state-monthly-report-list',compact('stateMonthlyReports'));
    }
    
    /**
     *  @stateMonthlyCreate show state monthly report form
     *
     * @return void
     */
    public function stateMonthlyCreate()
    {
        return view('state-user.state-monthly-report');
    }
    
    /**
     *  @stateMonthlystore store the record in the table
     *
     * @param  mixed $request
     * @return void
     */
    public function stateMonthlystore(StateMonthlyRequest $request)
    {
        try {
            DB::beginTransaction();
                $stateMonthlyReport = StateMonthlyReport::create([
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
            if($stateMonthlyReport){
                return redirect()->route('state.monthly-report-list')->with('message', 'State monthly report create successfull');
            }
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}