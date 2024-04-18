<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestigartionReportRequest;
use DB;
use Illuminate\Http\Request;

class StateUserMainController extends Controller
{
    public function stateDashboard(){
        return view('state-user.dashboard');
    }

    public function investigateReport(){
        return view('state-user.investigate-report');
    }

    public function investigateReportStore(Request $request){
        dd($request->all());
        $validates = $request->validated();
        $createdBy = auth()->user()->id;
        $validates['created_by'] = $createdBy;

        $report = DB::table('investigation_reports')->insert($validates);
        if($report){
            return redirect()->back()->with('success','Investigation Report Submitted Successfully');
        }else{
            return redirect()->back()->with('error','Investigation Report Submission Failed');
        }
    }

    public function monthlyReport(){
        return view('state-user.monthly-report');
    }
}
