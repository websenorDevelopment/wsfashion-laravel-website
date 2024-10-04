<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $categorySlug = null, $subCategorySlug = null)
    {

        $categorySelected = '';
        $subCategorySelected = '';
        $brandsArray = [];


        $categories = Category::orderBy("name", "ASC")->with("subcategories")->where("status", 1)->get();
        $brands = Brand::orderBy("name", "ASC")->where("status", 1)->get();

        $products = Product::where("status", 1);
        // Apply Filters Here.
        if (!empty($categorySlug)) {
            $category = Category::where("slug", $categorySlug)->first();
            $products = $products->where("category_id", $category->id);
            $categorySelected = $category->id;
        }
        if (!empty($subCategorySlug)) {
            $subcategory = SubCategory::where("slug", $subCategorySlug)->first();
            $products = $products->where("sub_category_id", $subcategory->id);
            $subCategorySelected = $subcategory->id;
        }
        if (!empty($request->get('brand'))) {
            $brandsArray = explode(',', $request->get('brand'));
            $products = $products->whereIn("brand_id", $brandsArray);
        }
        if (!empty($request->get('price_min') != '' && $request->get('price_max') != '')) {
            if ('price_max' == 10000) {
                $products = $products->whereBetween("price", [intval($request->get("price_min")), 1000000]);
            } else {
                $products = $products->whereBetween("price", [intval($request->get("price_min")), intval($request->get("price_max"))]);
            }
        }

        if ($request->get('sort') != '') {

            // Check for different sorting conditions
            if ($request->get('sort') == 'latest') {
                // Order by latest products (assumed by "id" in descending order)
                $products = $products->orderBy("id", "DESC");
            } else if ($request->get('sort') == 'price_asc') {
                // Order by price in ascending order
                $products = $products->orderBy("price", "ASC");
            } else if ($request->get('sort') == 'price_desc') {
                // Order by price in descending order
                $products = $products->orderBy("price", "DESC");
            }
        } else {
            // Default sorting if no specific sort option is chosen
            $products = $products->orderBy("id", "DESC");
        }


        $products = $products->get();

        $price_max =  (intval($request->get("price_max")) == 0) ? 10000 : $request->get("price_max");
        $price_min =  intval($request->get("price_min"));
        $sort =  $request->get("sort");

        // $products = Product::orderBy("title", "ASC")->where("status", "Active")->get();
        return view("front.shop", compact("categories", "brands", "products", "categorySelected", "subCategorySelected", "brandsArray", "price_min", "price_max", "sort"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function product($slug)
    {
        // echo $slug;
        $product = Product::where("slug", $slug)->with('product_images')->first();
        // dd($product);
        if ($product == null) {
            abort(404);
        }

        // Fetch Related Products
        $relatedProducts = [];
        if ($product->related_products != '') {
            $productArray = explode(',', $product->related_products);
            $relatedProducts = Product::whereIn('id', $productArray)->get();
        }

        return view('front.product', compact('product', 'relatedProducts'));
    }
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
