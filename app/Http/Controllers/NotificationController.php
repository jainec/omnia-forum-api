<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT');
    }
    
    public function index() {
        return [
            'read' => auth()->user()->readNotifications,
            'unread' => auth()->user()->unreadNotifications,        
        ];
    }

    public function markAsRead($notification_id) {        
        auth()->user()->unreadNotifications->where('id', $notification_id)->markAsRead();
        return response()->json('Notification marked as read!', 200);
    }
}
