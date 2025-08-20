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
    public function markRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['status' => 'read']);

        return redirect()->back()->with('success', 'Notification marked as read!');
    }

    public function delete($id)
    {
        Notification::findOrFail($id)->delete();
        return back()->with('success', 'Notification deleted successfully.');
    }

    public function deleteAll()
    {
        Notification::truncate();
        return back()->with('success', 'All notifications deleted successfully.');
    }
}
