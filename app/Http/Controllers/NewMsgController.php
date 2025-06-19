<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class NewMsgController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|max:20',
            'name' => 'required',
            'messages' => 'required',
        ], [
            'phone_number.required' => 'Please enter the number correctly',
            'phone_number.max' => 'Maximum 20 numbers allowed',
        ]);
        ContactUs::create([
            'phone_number' => $request->phone_number,
            'name' => $request->name,
            'messages' => $request->messages,
        ]);

        return redirect()->back()->with(['msg' => 'Your Msg Send successfully']);
    }
}
