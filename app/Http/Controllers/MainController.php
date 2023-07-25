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
    public function dashboard()
    {
        return view("dashboard");
    }
    
    public function pformview()
    {
        return view("pform");
    }
}
