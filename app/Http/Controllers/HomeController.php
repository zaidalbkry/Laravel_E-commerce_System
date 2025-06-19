<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // جلب المنتجات التي لديها تعليقات ولم يتم الرد عليها
        // جلب المنتجات التي تحتوي على تعليقات بدون رد
        $productsWithUnansweredComments = Product::whereHas('comments', function ($query) {
            $query->whereNull('reply');
        })->get();
        // إجمالي عدد الطلبات
        $totalOrders = Order::count();

        // تجميع عدد الطلبات حسب الحالة
        $ordersByStatus = Order::select('status')
            ->selectRaw('count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        // إجمالي الإيرادات (على سبيل المثال حسب فترة محددة، هنا كافة الطلبات)
        $totalRevenue = Order::sum('total_price');

        // متوسط قيمة الطلب
        $averageOrderValue = $totalOrders > 0 ? Order::sum('total_price') / $totalOrders : 0;

        // عدد العملاء الجدد خلال فترة معينة (مثلاً في آخر شهر)
        $newCustomersCount = User::where('created_at', '>=', Carbon::now()->subMonth())->count();

        // أعلى المنتجات مبيعًا
        $topSellingProducts = Product::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(5)
            ->get();



        // يمكنك أيضًا جمع بيانات الرسم البياني للطلبات عبر الفترات
        $ordersByMonth = Order::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
           ->groupBy('month')
           ->orderBy('month', 'asc')
           ->get();

        return view('dashbord.home', compact(
            'productsWithUnansweredComments',
            'totalOrders',
            'ordersByStatus',
            'totalRevenue',
            'averageOrderValue',
            'newCustomersCount',
            'topSellingProducts',
            'ordersByMonth'));
    }
}
