<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriber = Subscriber::all();
        return view('dashbord.subscriber.subscriber', compact('subscriber'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|max:20|unique:subscribers',
        ], [
            'phone_number.required' => 'Please enter the number correctly',
            'phone_number.unique' => 'The number is already registered',
            'phone_number.max' => 'Maximum 20 numbers allowed',

        ]);

        Subscriber::create([
            'phone_number' => $request->phone_number,

        ]);
        return redirect()->back()->with(['msg' => 'Number added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'phone_number' => 'required|max:20|unique:subscribers',
        ], [
            'phone_number.required' => 'Please enter the number correctly',
            'phone_number.unique' => 'The number is already registered',
            'phone_number.max' => 'Maximum 20 numbers allowed',

        ]);

        $subscriber = Subscriber::find($id);

        $subscriber->update([
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->back()->with(['msg' => 'Number updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Subscriber::find($id)->delete();
        return redirect()->back()->with(['msg' => 'Number deleted successfully']);
    }
}
