<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // جلب جميع الإشعارات
        $notifications = $user->notifications()->latest()->get();

        // تعليم الإشعارات كمقروءة
        $user->unreadNotifications()->update(['is_read' => true]);

        return view('frontend.my-notifications', compact('notifications'));
    }
}
