<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;  

    public function subcategory()
    {
        return $this->hasMany('App\Models\Subcategory', 'id', 'category_id');
    }

    // I CANT TRY THIS DUE TO SHORTAGE OF TIME CATEGORY-PRODUCT
    // public function product()
    // {
    //     $cat = Product::subcategory;
    //     return $this->hasMany('App\Models\Product', 'id', $cat->category_id);
    // }
}
