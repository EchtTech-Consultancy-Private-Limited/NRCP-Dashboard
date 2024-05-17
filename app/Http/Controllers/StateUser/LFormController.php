<?php

namespace App\Http\Controllers\StateUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LineSuspected;

class LFormController extends Controller
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
}
