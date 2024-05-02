<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InvestigartionReportRequest;

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
        dd($request->all());
    }
}
