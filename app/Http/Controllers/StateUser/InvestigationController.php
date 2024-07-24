<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InvestigartionReportRequest;
use App\Models\InvestigateReport;
use Illuminate\Support\Facades\Auth;

class InvestigationController extends Controller
{    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('state-user.investigation.investigate-report');
    }
    
    /**
     *  @store invetigation report
     *
     * @param  mixed $request
     * @return void
     */
    public function store(InvestigartionReportRequest $request)
    {  
        try {
            DB::beginTransaction();
            
            $investigateReport = new InvestigateReport();
            $investigateReport->fill($request->all());
            $investigateReport->user_id = Auth::id();
            $investigateReport->save();
            DB::commit();
            return redirect()->route('state.investigate-report-list')->with('message', 'Investigate report created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    
    /**
     *  @list get all list of invetigate report
     *
     * @return void
     */
    public function list()
    {
        $investigateReports = InvestigateReport::where('user_id',Auth::id())->orderBy('id', 'desc')->get();
        return view('state-user.investigation.investigate-report-list',compact('investigateReports'));
    }
}
