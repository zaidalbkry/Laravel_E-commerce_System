<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    // تسجيل دخول الأدمن (الافتراضي)
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee') {
                return redirect()->route('home');
            } else {
                return redirect()->route('storePage');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // إعادة التوجيه بعد الخروج
    }


    // إظهار فورم تسجيل دخول المستخدمين
    public function showUserLoginForm()
    {
        return view('auth.login'); // أنشئ ملف user-login.blade.php
    }

    // إظهار فورم تسجيل المستخدمين الجدد
    public function showUserRegisterForm()
    {
        return view('auth.register'); // أنشئ ملف user-register.blade.php
    }



    // تسجيل دخول المستخدم العادي
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // تسجيل مستخدم جديد
    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // تسجيله كمستخدم عادي
        ]);

        Auth::login($user);
        return redirect()->route('user.profile');
    }












    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // use AuthenticatesUsers;
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('auth')->only('logout');
    // }
}
