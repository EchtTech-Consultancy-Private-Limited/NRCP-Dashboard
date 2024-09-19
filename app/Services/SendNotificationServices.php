<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class SendNotificationServices
{
    function sendNotification($formId = '', $formType = '', $receiverId ='', $status = '')
    {
        try {
            DB::beginTransaction();
            $notification = Notification::updateOrCreate(
                [
                    'form_id'   => $formId,
                    'form_type'   => $formType,
                ],
                [
                    'sender_id' => Auth::id(),
                    'receiver_id' => $receiverId,
                    'form_id' => $formId,
                    'form_type' => $formType,
                    'status' => $status,
                ]
            );
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}