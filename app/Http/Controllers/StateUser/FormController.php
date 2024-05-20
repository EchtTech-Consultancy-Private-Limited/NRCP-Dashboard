<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LineSuspected;

class FormController extends Controller
{
    /**
     * lFormList
     *
     * @return void
     */
    public function lFormList()
    {
        $lineSuspecteds = LineSuspected::orderBy('id', 'desc')->get();
        return view('state-user.lform.list',compact('lineSuspecteds'));
    }

    /**
     * lFormList
     *
     * @return void
     */
    public function lFormCreate()
    {
        return view('state-user.lform.create');
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
    }
}
