<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewNumberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(Request $request)
    {

        // dd($request->phone_number);
        $request->validate([
            'phone_number' => 'required|max:20|unique:subscribers',
        ], [
            'phone_number.required' => 'Please enter the number correctly and do not leave the field empty',
            'phone_number.unique' => 'The number is already registered!',
            'phone_number.max' => 'Cannot enter more than 20 digits',

        ]);

        Subscriber::create([
            'phone_number' => $request->phone_number,

        ]);
        return redirect()->back()->with(['msg' => 'Number added successfully']);
    }
}
