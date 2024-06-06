<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StateMonthlyRequest;
use App\Http\Requests\StateLineSuspectedRequest;
use Illuminate\Support\Facades\DB;
use App\Models\StateMonthlyReport;
use App\Models\CountryState;
use App\Models\LineSuspected;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LineSuspectedExport;
use App\Exports\StateMonthlyReportExport;
use App\Exports\StateLformExport;
use App\Models\InvestigateReport;
use App\Models\StateUserLForm;
use App\Models\LineSuspectedCalculate;

class StateController extends Controller
{    
    /**
     *  @index state user dashboard
     *
     * @return void
     */
    public function index()
    {
        $stateMonthlyReport = StateMonthlyReport::count();
        $lineSuspected = LineSuspected::count();
        $investigateReport = InvestigateReport::count();
        return view('state-user.dashboard',compact('stateMonthlyReport','lineSuspected','investigateReport'));
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

    
    /**
     *  @lineSuspectedList show
     *
     * @return void
     */
    public function lineSuspectedList()
    {
        $lineSuspecteds = LineSuspected::with('lineSuspectedCalculate')->orderBy('id', 'desc')->get();
        return view('state-user.line-suspected-list',compact('lineSuspecteds'));
    }
    
    /**
     * lineSuspectedCreate show form
     *
     * @return void
     */
    public function lineSuspectedCreate()
    {
        $states = CountryState::get();
        return view('state-user.line-suspected-create',compact('states'));
    }
    
    /**
     *  @lineSuspectedstore save
     *
     * @param  mixed $request
     * @return void
     */
    public function lineSuspectedstore(StateLineSuspectedRequest $request)
    {
        try {
            DB::beginTransaction();
                $lineSuspectedId = LineSuspected::create([
                    'suspected_date' => $request->suspected_date,
                    'name_of_health' => $request->name_of_health,
                    'address_hospital' => $request->address_hospital,
                    'designation_name' => $request->designation_name,
                    'type_of_health' => $request->type_of_health,
                    'email' => $request->email,
                    'aadhar_number' => $request->aadhar_number,
                ])->id;
                foreach($request->row_count as $index => $value){
                    LineSuspectedCalculate::Create([
                        'line_suspected_form_id' => $lineSuspectedId,
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
                    ]);
                }
            DB::commit();
            return redirect()->route('state.line-suspected-list')->with('message', 'Line Suspected create successfull');

        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     *  @excelReport model view page
     *
     * @return void
     */
    public function excelReport()
    {
        return view('state-user.excel-report');
    }
    
    /**
     *  @reportExport of satate dashboard module
     *
     * @param  mixed $request
     * @return void
     */
    public function reportExport(Request $request)
    {
        $request->validate([
            'modulename' => 'required',
        ]);

        if (!empty($request->startdate) && !empty($request->enddate)) {
            $start_date = Carbon::parse($request->startdate . ' 00:00:00')->format('Y-m-d H:i:s');
            $end_date = Carbon::parse($request->enddate . ' 23:59:59')->format('Y-m-d H:i:s');
        } else {
            $start_date = Carbon::parse('1900-01-01 00:00:00')->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->addYear(100)->format('Y-m-d H:i:s');
        }

        $fileName = '';
        $query = null;
        switch ($request->modulename) {
            case '1':
                $fileName = 'InvestigateReport';
                $query = InvestigateReport::query();
                break;
            case '2':
                $fileName = 'StateMonthlyReport';
                $query = StateMonthlyReport::query();
                break;
            case '3':
                $fileName = 'LineSuspected';
                $query = LineSuspected::with('lineSuspectedCalculate');
                break;
            case 'lform':
                $fileName = 'StateUserlform';
                $query = StateUserLForm::with([
                    'stateUserLFormCountCase.states',
                    'stateUserLFormCountCase.city'
                ]);
                break;
            default:
                return response()->json(['error' => 'Invalid module name'], 400);
        }

        if (!empty($request->startdate) && !empty($request->enddate)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        $arrays = [$query->get()->toArray()];
        if($request->modulename == 'lform' || $request->modulename == '3'){
            return Excel::download(new StateLformExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
        }
        return Excel::download(new StateMonthlyReportExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }
    
    
}
