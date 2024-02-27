<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use App\Models\ReportGenerateController;
use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Expenditure;
use App\Models\GeneralProfile;
use App\Models\QualityAssurance;
use App\Models\RabiesTest;
use App\Exports\ReportGeneralExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportGenerateControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $EquipmentsTotal = Equipments::count();
        $ExpenditureTotal = Expenditure::count();
        $GeneralProfileTotal = GeneralProfile::count();
        $QualityAssuranceTotal = QualityAssurance::count();
        $RabiesTestTotal = RabiesTest::count();
        
        return view('report-list',['EquipmentsTotal'=>$EquipmentsTotal,'ExpenditureTotal'=>$ExpenditureTotal,
        'GeneralProfileTotal'=>$GeneralProfileTotal,
        'QualityAssuranceTotal'=>$QualityAssuranceTotal,'RabiesTestTotal'=>$RabiesTestTotal]);
    }
    public function export(Request $request) 
    {   
        $start_date = Carbon::parse("$request->startdate 00:00:00")->format('Y-m-d H:i:s');
        $end_date = Carbon::parse("$request->enddate 23:59:59")->format('Y-m-d H:i:s');
        
        if($request->bthValue =='pdf'){
            $this->generatePDF();
        }else{
            if($request->modulename =='1'){
                $fileName = 'GeneralProfile';
                $level_three_array = GeneralProfile::where(['soft_delete' => 0])->get()->toarray();
                $arrays = [$level_three_array];
            }elseif($request->modulename =='2'){
                $fileName = 'QualityAssurance';
                $level_four_array = QualityAssurance::where(['soft_delete' => 0])->get()->toarray();
                $arrays = [$level_four_array];
            }
            elseif($request->modulename =='3'){
                $fileName = 'Equipments';
                $level_one_array = Equipments::where(['soft_delete' => 0])->get()->toarray();
                $arrays = [$level_one_array];
            }
            elseif($request->modulename =='4'){
                $fileName = 'RabiesTest';
                $level_five_array = RabiesTest::where(['soft_delete' => 0])->get()->toarray();
                $arrays = [$level_five_array];
            }
            elseif($request->modulename =='5'){
                $fileName = 'Expenditure';
                $level_two_array = Expenditure::where(['soft_delete' => 0])->get()->toarray();
                $arrays = [$level_two_array];
            }else{
                $level_one_array = Equipments::where(['soft_delete' => 0])->get()->toarray();
                $level_two_array = Expenditure::where(['soft_delete' => 0])->get()->toarray();
                $level_three_array = GeneralProfile::where(['soft_delete' => 0])->get()->toarray();
                $level_four_array = QualityAssurance::where(['soft_delete' => 0])->get()->toarray();
                $level_five_array = RabiesTest::where(['soft_delete' => 0])->get()->toarray();
                $arrays = [$level_one_array, $level_two_array, $level_three_array,$level_four_array,$level_five_array];
            }
            return Excel::download(new ReportGeneralExport($arrays), Carbon::now()->format('d-m-Y').'-'.$fileName.'.xlsx');
        }
    }
       

    public function generatePDF()
    {
        $users = Equipments::get();
  
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('itsolutionstuff.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportGenerateController $reportGenerateController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportGenerateController $reportGenerateController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportGenerateController $reportGenerateController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportGenerateController $reportGenerateController)
    {
        //
    }
}
