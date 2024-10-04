<?php

// echo "Hello Usman";

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\SubCategory;

// function getSections()
// {
// return Section::orderBy('id', 'asc')
// ->with('category')
// ->where('showhome', '=', 'Yes')
// ->get();
// }

function getSections()
{
    // Fetch sections with their respective categories and subcategories
    return Section::with('categories.subcategories')
        ->where('status', '=', 1)
        ->where('showhome', '=', 'Yes')  // Filter by 'showhome' attribute
        ->orderBy('id', 'asc')           // Order sections by ID
        ->get();                         // Retrieve the collection
}


function getCategories()
{
    return Category::orderBy('name', 'asc')
        ->with('subcategories')
        ->where('showhome', '=', 'Yes')
        ->get();
}
function getSubCategories()
{
    return SubCategory::orderBy('name', 'asc')
        ->where('showhome', '=', 'Yes')
        ->get();
}
function getProducts()
{
    return Product::orderBy('title', 'asc')
        ->where('status', '=', 'Active')
        ->get();
}

function getBrands()
{
    return Brand::orderBy('name', 'asc')->get();  // Fetch all brands ordered by name
}
