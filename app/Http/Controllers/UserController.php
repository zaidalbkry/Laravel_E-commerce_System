<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::all();
        return view('dashbord.users.index', compact('data'));
    }


    public function create()
    {
        return view('dashbord.users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return redirect()->route('users.index')
        ->with('msg', 'User added successfully');
    }




    public function edit($id)
    {
        $user = User::find($id);
        return view('dashbord.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $input = $request->all();

        $user = User::find($id);

        $user->update($input);

        return redirect()->route('users.index')
        ->with('msg', 'User information updated successfully');
    }
public function update_profile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
    ]);

    $user = Auth::user(); // ✅ استخدام `Auth::user()` للحصول على المستخدم الحالي
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->back()->with('success', 'تم تحديث معلوماتك بنجاح!');
}


    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();
        return redirect()->route('users.index')->with('msg', 'User deleted successfully');    }
}
