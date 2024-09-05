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
        $categories = Category::with('products')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        #
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = \Str::slug($request->name);
            $category->save();
            return redirect()->back()->with('success', 'Category created successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'An error occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = \Str::slug($request->name);
            $category->save();
            return redirect()->back()->with('success', 'Category updated successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'An error occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'An error occurred');
        }
    }
}
