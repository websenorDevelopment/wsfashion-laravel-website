<?php

namespace App\Models;

use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Need to define a relation between ("products", "product_images") to show Images in the "Product List".
    public function product_images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function subcategories()
    {
        return $this->belongsTo(SubCategory::class);
    }
    // Defining the relationship with the Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
