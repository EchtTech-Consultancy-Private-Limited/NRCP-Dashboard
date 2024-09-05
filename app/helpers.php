<?php
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function state_list(){
    $states = DB::table('states')->get();
    return $states;
}

function district_list(){
    $district = DB::table('district')->get();
       return $district;
}

function notifications()
{
    $notifications = Notification::where('receiver_id', Auth::id())->orderBy('id','desc')->get();
    return $notifications;
}

function senderName($senderId)
{
    $senderName = DB::table('dashboard_login')->where('id', $senderId)->first();
    return $senderName;
}

?>
