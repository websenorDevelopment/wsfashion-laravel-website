<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addToCart(Request $request)
    {
        // Fetch the product along with images
        $product = Product::with('product_images')->find($request->id);

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found',
            ]);
        }

        // Check if the product already exists in the cart
        $productInCart = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        })->first();

        if ($productInCart) {
            // Product already exists in the cart
            $status = false;
            $message = $product->title . " already exists in the Cart";
        } else {
            // Get the first product image or set a placeholder
            $productImage = $product->product_images->first() ?? '';

            // Add the product to the cart
            Cart::add(
                $product->id,
                $product->title,
                1,
                $product->price,
                ['productImage' => $productImage]
            );

            $status = true;
            $message = "<strong>". $product->title . " </strong> added to the Cart";
            session()->flash('success', $message);
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function cart()
    {
        //
        // dd(Cart::content()); // For testing purpose.
        $cartContent = Cart::content();
        // dd($cartContent);
        return view("front.cart", compact('cartContent'));
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;


        //Check Quantity Available in the Stock.
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);
        if ($product->track_qty == 'Yes') {
            if ($qty <= $product->qty) {
                Cart::update($rowId, $qty);
                $status = true;
                $message = 'Cart quantity updated successfully.';
                session()->flash('success', $message);
            } else {
                $status = false;
                $message = 'Requested quantity (' . $qty . ') is not available in the Stock.';
                session()->flash('error', $message);
            }
        } else {
            Cart::update($rowId, $qty);
            $status = true;
            $message = 'Cart quantity updated successfully.';
            session()->flash('success', $message);
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function deleteItem(Request $request)
    {
        $rowId = $request->rowId;
        $itemInfo = Cart::get($rowId);

        if ($itemInfo == null) {
            $status = false;
            $message = 'Product not found in the Cart.';
            session()->flash('error', $message);

            return response()->json([
                'status' => $status,
                'message' => $message,
            ]);
        } else {
            Cart::remove($request->rowId);
            $status = true;
            $message = 'Product has been successfully removed from the Cart.';
            session()->flash('success', $message);

            return response()->json([
                'status' => $status,
                'message' => $message,
            ]);
        }
    }
    public function deleteMultipleItems(Request $request)
    {
        $items = $request->items;

        if (empty($items)) {
            return response()->json([
                'status' => false,
                'message' => 'No items selected to delete.'
            ]);
        }

        // Loop through selected items and remove them from the cart
        foreach ($items as $rowId) {
            $itemInfo = Cart::get($rowId);

            if ($itemInfo != null) {
                Cart::remove($rowId);  // Remove each item
            }
        }

        $status = true;
        $message = 'Selected items have been successfully deleted from the Cart.';

        return response()->json([
            'status' => $status,
            'message' => $message,
            'cartCount' => Cart::count()  // Return the updated cart count
        ]);
    }

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
