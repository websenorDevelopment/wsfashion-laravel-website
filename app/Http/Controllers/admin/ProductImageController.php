<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;



class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function update(Request $request)
    {
        // Check if an image file was uploaded
        if (!$request->hasFile('image')) {
            return response()->json([
                'status' => false,
                'message' => 'No image file was uploaded.'
            ]);
        }

        $image = $request->file('image'); // Getting the uploaded image file

        // Validate the image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048'
        ]);

        $ext = $image->getClientOriginalExtension(); // Getting file extension

        // Create new ProductImages record with product_id
        $productImage = new ProductImages();
        $productImage->product_id = $request->product_id;

        // Generate a unique name using product_id and current timestamp
        $imageName = $request->product_id . '-' . time() . '.' . $ext;

        // Define the destination path in the public directory
        $dPath = public_path('uploads/Products/' . $imageName);

        // Move the uploaded file to the destination path
        $image->move(public_path('uploads/Products'), $imageName);

        // Update the image field with the unique image name
        $productImage->image = $imageName;
        $productImage->save(); // Save record with the image name

        // Returning JSON Response
        return response()->json([
            'status' => true,
            'image_id' => $productImage->id,
            'imagePath' => asset('uploads/Products/' . $imageName),
            'message' => 'Image has been saved successfully.'
        ]);
    }

    // public function update(Request $request)
    // {

    //     $image = $request->file('image'); // Getting the uploaded image file

    //     $ext = $image->getClientOriginalExtension(); // Getting file extension
    //     $sPath = $image->getPathName();

    //     // Create new ProductImages record with product_id
    //     $productImage = new ProductImages();
    //     $productImage->product_id = $request->product_id;
    //     $productImage->image = 'NULL';
    //     $productImage->save(); // Save initially to get the ID

    //     // Generate a unique name using product_id and the productImage ID
    //     $imageName = $request->product_id . '-' . $productImage->id . '-' . time() . '.' . $ext;

    //     // Update the image field with the unique image name
    //     $productImage->image = $imageName;
    //     $productImage->save();

    //     // Define the destination path in the public directory
    //     $dPath = public_path('uploads/Products/' . $imageName);
    //     $image->move(public_path('uploads/Products'), $imageName);

    //     // Returning JSON Response

    //     return response()->json([
    //         'status' => true,
    //         'image_id' => $productImage->id,
    //         'imagePath' => asset('/uploads/Products/' . $productImage->image),
    //         'message' => 'Image has been saved successfully.'
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $productImage = ProductImages::find($request->id);
        if (empty($productImage)) {
            // return redirect()->route('products.index');
            session()->flash("error", "Product Image Could Not Be Found.");
            return response()->json([
                "status" => false,
                "message" => "Product Image Could Not Be Found."
            ]);
        }
        File::delete(public_path("/uploads/Products/$productImage->image"));
        // File::delete(public_path("/tempImgs/$product->image"));
        $productImage->delete();

        session()->flash("success", "Product Image Has Been Successfully Deleted.");

        return response()->json([
            "status" => true,
            "message" => "Product Image Has Been Deleted Successfully !",
        ]);

        // dd($request->all());
       
        }

}
