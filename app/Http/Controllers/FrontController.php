<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $featured_products = Product::where("is_featured", "yes")
            ->orderBy('id', 'Desc')
            ->take(8)
            ->where('status', 1)
            ->get();
        $latest_products = Product::orderBy('id', 'Desc')
            ->where('status', 1)
            ->take(8)
            ->get();


        return view("front.Ytb_home", compact("featured_products", "latest_products")); // To Follow 
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
