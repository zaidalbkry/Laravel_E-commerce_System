<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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


    /**
     * تقوم هذه الدالة بتخزين بيانات إشعار جديد لكل مستخدم في جدول notifications.
     *
     * من المتوقع أن يحتوي الطلب على الحقول:
     * - title: عنوان الإشعار.
     * - body: محتوى الإشعار.
     */
    public function storeNotification(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        // الحصول على البيانات المطلوبة من الطلب
        $data = $request->only(['title', 'body']);

        // جلب جميع المستخدمين؛ يمكنك تعديل هذا الاستعلام لاستهداف مجموعة معينة فقط
        $users = User::all();

        // لكل مستخدم نقوم بتخزين سجل إشعار جديد في جدول notifications
        foreach ($users as $user) {
            DB::table('notifications')->insert([
                'user_id'    => $user->id,
                'title'      => $data['title'],
                'body'       => $data['body'],
                'is_read'    => 0,          // القيمة الافتراضية عدم القراءة
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success','تم ارسال الإشعار بنجاح.');

    }
}


