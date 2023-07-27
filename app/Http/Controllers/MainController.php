<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Hash;
use Redirect;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(Request $request)
    {
        $type = $request->type;
        //dd($type);
        return view("dashboard")->with('type',$type);
    }
    
    public function pformview()
    {
        return view("pform");
    }
    
    public function login()
    {
        return view("login");
    }
}
