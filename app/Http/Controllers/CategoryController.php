<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashbord.categories.categories', compact('categories'));
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
            'name' => 'required|unique:categories',
        ], [
            'name.required' => 'Please enter the Category correctly',
            'name.unique' => 'The name is already addes',


        ]);

        Category::create([
            'name' => $request->name,

        ]);
        return redirect()->back()->with(['msg' => 'Category added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
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
            'name' => 'required|unique:categories',
        ], [
            'name.required' => 'Please enter the Category correctly',
            'name.unique' => 'The name is already addes',
        ]);

        $categories = Category::find($id);

        $categories->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with(['msg' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Category::find($id)->delete();
        return redirect()->back()->with(['msg' => 'Category deleted successfully']);
    }
}
