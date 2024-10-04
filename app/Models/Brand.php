<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    // Defining the relationship with the Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
