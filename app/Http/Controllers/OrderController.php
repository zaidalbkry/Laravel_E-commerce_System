<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Str;
use App\Events\OrderStatusChanged;
class OrderController extends Controller
{
    /**
     * عرض جميع الطلبات
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(1000); // جلب الطلبات مع الترتيب حسب الأحدث
        return view('dashbord.orders.index', compact('orders'));
    }

    /**
     * عرض نموذج تعديل الطلب
     */
    public function edit(Order $order)
    {
        return view('dashbord.orders.edit', compact('order'));
    }

    /**
     * تحديث حالة الطلب
     */
public function update(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:pending,received,delivering,canceled'
    ]);

    $order->update(['status' => $request->status]);

    // ✅ إطلاق الحدث بعد التحديث
    event(new OrderStatusChanged($order));

    return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
}

public function store(Request $request)
{
    $request->validate([
        'phone_number' => 'required|digits_between:8,15',
        'cart_items' => 'required'
    ]);

    $cartItems = json_decode($request->cart_items, true);
    $totalPrice = collect($cartItems)->sum('price');

    // Generate a unique order number
    $orderNumber = 'ORD-' . strtoupper(uniqid());
    
    // إنشاء الطلب وتخزين بيانات JSON في products_data
    $order = Order::create([
        'user_id' => Auth::id(),
        'phone_number' => $request->phone_number,
        'order_number' => $orderNumber,
        'total_price' => $totalPrice,
        'products_data' => $cartItems,
        'status' => 'pending'
    ]);

    // ربط المنتجات بالطلب عبر جدول order_product
    // هنا نفترض أن $cartItems تحتوي على مفتاح 'id' و 'quantity' لكل منتج
    foreach ($cartItems as $item) {
        // تحقق من وجود المفتاح 'id' و 'quantity'
        if (isset($item['id']))  {
            $order->products()->attach($item['id'], ['quantity' => $item['quantity'] ??1 ]);
        }
    }

    return redirect()->back()->with('success', 'Your order has been placed successfully!');
}


public function cancel(Order $order)
{
    // تأكد أن الحالة الحالية هي pending فقط
    if ($order->status !== 'pending') {
        return back()->with('error', 'لا يمكن إلغاء هذا الطلب حالته ليست "قيد الانتظار".');
    }

    $order->update(['status' => 'canceled']);

    return back()->with('success', 'تم إلغاء الطلب بنجاح.');
}


}
