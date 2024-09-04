<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications(Request $request)
    {
        $userId = Auth::id();
        $userType = Auth::user()->user_type;
        $notifications = Notification::where('receiver_id', $userId)->get();
        $totalNew = Notification::where('receiver_id', $userId)->latest('25')->count();
        $totalReported = $notifications->count();
        $confirmed = $notifications->where('status', '1')->count();
        $returned = $notifications->where('status', '2')->count();

        return response()->json([
            'totalNew' => $totalNew,
            'totalReported' => $totalReported,
            'confirmed' => $confirmed,
            'returned' => $returned,
        ]);
    }
}