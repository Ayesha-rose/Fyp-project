<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Request;
use Illuminate\Routing\Controller;

use App\Models\Notification;

class NotificationController extends Controller
{
    // Show all notifications
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('admin.notifications.index', compact('notifications')); 
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return redirect()->back();
    }
}
