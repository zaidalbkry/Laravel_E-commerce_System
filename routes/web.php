<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewMsgController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewNumberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubscriberController;
 use App\Http\Controllers\FavoriteController;
  use App\Http\Controllers\ReviewController;
  use App\Http\Controllers\NotificationsController;
 use App\Http\Controllers\Admin\DashboardController; 
// ******************************
// Auth
// ******************************

Route::post('/login', [LoginController::class, 'Login']);
Route::post('/register', [LoginController::class, 'userRegister']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showUserLoginForm'])->name('login');
    Route::get('/register', [LoginController::class, 'showUserRegisterForm'])->name('register');
});

// ******************************
// Front-End
// ******************************

// الرئيسية
Route::get('/', function () {
    $products = Product::where('is_important', true)
    ->with('category') // اجلب بيانات الصنف المرتبط بالمنتج
    ->take(12)
    ->get();
    
    return view('frontend.index', compact('products'));
})->name('storePage');


Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/all-products', [ProductController::class, 'index3'])->name('allProducts');

// إضافة تعليق
Route::post('/product/{id}/comment', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comment.store');

// إضافة رد (فقط للمشرفين)
Route::post('/comment/{id}/reply', [CommentController::class, 'reply'])
    ->middleware(['auth', 'admin'])
    ->name('comment.reply');


Route::view('/about-us', 'frontend.about-us');
Route::view('/contact-us', 'frontend.contact-us');

Route::resource('/new-number', NewNumberController::class);
Route::resource('/new-msg', NewMsgController::class);

// ******************************
// Dashboard
// ******************************


Route::middleware(['auth', 'employeeORadmin'])->group(function () {
    // Home
    Route::get('/admin', [HomeController::class, 'index'])->name('home');
    // Categories
    Route::resource('/admin/categories', CategoryController::class);
    // Products
    Route::resource('/admin/products', ProductController::class);
    // Best Products
    Route::get('/admin/best-products', [ProductController::class , 'index2']);
    Route::get('/products/edit2/{id}', [ProductController::class, 'edit2'])->name('products.edit2');

});




Route::middleware(['auth', 'admin'])->group(function () {
;

Route::post('/admin/send-notifications', [NotificationsController::class, 'storeNotification'])
    ->name('admin.notifications.send');

    // Users
    Route::resource('/admin/users', UserController::class);

    // subscriber
    Route::resource('/admin/subscribers', SubscriberController::class);

    // messages
    Route::resource('/admin/messages', ContactUsController::class);

    // Orders (إدارة الطلبات)
    Route::resource('/admin/orders', OrderController::class)->only(['index', 'edit', 'update']);
});




// ******************************
// User
// ******************************

// صفحة ملف المستخدم بعد تسجيل الدخول
Route::middleware(['auth'])->group(function () {
    // Profile page route
    Route::get('/my-profile', function () {
        return view('frontend.user-profile');
    })->name('user.profile');

    // My Card page route (adjust view name if necessary)
    Route::get('/my-card', function () {
        return view('frontend.my-card');
    })->name('user.card');

    // My Orders page route
    Route::get('/my-orders', function () {
        $orders = Order::where('user_id', Auth::id())->get(); // Fetch orders for the current user
        return view('frontend.my-orders', compact('orders'));
    })->name('user.orders');

    // My Notifications page route
    Route::get('/my-notifications', function () {
        return view('frontend.my-notifications');
    })->name('user.notifications');

Route::post('/favorite/add', [ProductController::class, 'addFavorite'])->name('favorite.add');  
Route::post('/favorite/remove', [ProductController::class, 'removeFavorite'])->name('favorite.remove');
Route::get('/favorite/products', [ProductController::class, 'favoriteProducts'])->name('favorite.products');

Route::post('/submit-review', [ReviewController::class, 'store'])->name('review.store');

Route::get('/my-favorite', [FavoriteController::class, 'favoriteProducts'])->name('user.favorite');

Route::put('/profile/update', [UserController::class, 'update_profile'])->name('profile.update');

Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

Route::get('/notifications', [NotificationsController::class, 'index'])->name('client.notifications');

});
Route::post('/store-order', [OrderController::class, 'store'])->name('order.store');

Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
Route::get('/filtered-products', [ProductController::class, 'filteredResults'])->name('products.filtered');


Route::get('/search', [ProductController::class, 'search'])->name('product.search');



Route::post('/checkout', [OrderController::class, 'checkout'])->middleware('auth');
Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->middleware('auth', 'admin');
