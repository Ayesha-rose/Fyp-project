<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NotificationController extends Controller
{
    
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function markRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Notification marked as read!');
    }

   
    public function markAllAsRead()
    {
        Notification::where('is_read', false)->update(['is_read' => true]);

        return redirect()->back()->with('success', 'All notifications marked as read!');
    }

  
    
    public function delete($id)
    {
        Notification::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }

    public function deleteAll()
    {
        Notification::truncate();
        return redirect()->back()->with('success', 'All notifications deleted successfully.');
    }
}
