<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;   

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory', 'subcategory_id', 'id');
    }

    // I CANT TRY THIS DUE TO SHORTAGE OF TIME PRODUCT-CATEGORY
    // public function category()
    // {
    //     $cat = Category::subcategory;
    //     return $this->belongsTo('App\Models\Subcategory', 'subcategory_id', $cat->category_id);
    // }
}
