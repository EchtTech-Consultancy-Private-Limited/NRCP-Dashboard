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
        // Validate the incoming request data
        $request->validate([
            'modulename' => 'required',
        ],
        ['modulename.required'  => 'Module Name field is required'

        ]);

        // Parse the start and end date if provided
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $start_date = Carbon::parse("$request->startdate 00:00:00")->format('Y-m-d H:i:s');
            $end_date = Carbon::parse("$request->enddate 23:59:59")->format('Y-m-d H:i:s');
        } else {
            // Set a wide range if start and end dates are empty
            $start_date = Carbon::parse("1900-01-01 00:00:00")->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->addYear(100)->format('Y-m-d H:i:s');
        }
        $fileName = '';
        $arrays = [];
        switch ($request->modulename) {
            case '1':
                $fileName = 'GeneralProfile';
                $query = GeneralProfile::where('soft_delete', 0);
                break;
            case '2':
                $fileName = 'QualityAssurance';
                $query = QualityAssurance::where('soft_delete', 0);
                break;
            case '3':
                $fileName = 'Equipments';
                $query = Equipments::where('soft_delete', 0);
                break;
            case '4':
                $fileName = 'RabiesTest';
                $query = RabiesTest::where('soft_delete', 0);
                break;
            case '5':
                $fileName = 'Expenditure';
                $query = Expenditure::where('soft_delete', 0);
                break;
            default:
                return response()->json(['error' => 'Invalid module name'], 400);
        }
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        $data = $query->get();
        if($data->isEmpty()){
            return redirect()->back()->with('error','No data is available for Export');
        }

        $arrays = [$query->get()->toArray()];
        return Excel::download(new ReportGeneralExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
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
