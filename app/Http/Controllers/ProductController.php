<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
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
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();

            return redirect()->back()->with('success', 'Product created successfully');
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
            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();

            return redirect()->back()->with('success', 'Product updated successfully');
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
            $product = Product::find($id);
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'An error occurred');
        }
    }
}
