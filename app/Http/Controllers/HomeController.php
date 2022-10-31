<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('create')->with('subcategories', $subcategories);
    }
    
    public function createSubmit(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:products,title|string', // regex:/^[a-z A-Z]+$/
            'subcategory'=>'required|numeric|min:1',
            'price'=>'required',
            'thumbnail' => 'mimes:jpg,jpeg,png,bmp|max:10240',     
            'description'=>'nullable|string',       
        ],[
            'title.required' => 'Enter product title',
            'title.unique' => 'This product already exists',
            'subcategory.required' => 'Select any subcategory',
            'subcategory.min' => 'Select any subcategory',
            'price.required' => 'Enter product price',
            'thumbnail.mimes' => 'Only image allowed',
            'thumbnail.max' => 'Image size should be less than 10MB'
        ]);          

        $product = new Product();
        $product->title = $request->title;
        $product->subcategory_id = $request->subcategory;
        $product->price = $request->price;
        $product->description = $request->description;  

        if($request->thumbnail)
        {
            $thumbnail = $request->title.'_'.$request->subcategory.'.'.$request->thumbnail->extension();    
            $request->thumbnail->move(public_path('product thumbnail'), $thumbnail);
            $product->thumbnail = $thumbnail;
        }   
        
        $product->save();

        $subcategories = Subcategory::all();
        // return response()->json(['message' => $product]);
        return view('create')->with('subcategories', $subcategories);
    }

    public function list()
    {
        $products = Product::all();
        return view('list', compact('products'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if($product)
        {$product->delete();}
        
        return response()->json(['message' => 'Product Has Been Deleted Successfully!']);
    }

    public function filter()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('filter', compact('categories', 'subcategories'));
    }

    public function filterSubmit(Request $request)
    {
        $products = Product::join('subcategories as sc', 'sc.id', '=', 'products.subcategory_id')
        ->join('categories as c', 'c.id', '=', 'sc.category_id');
        
        if($request->title != NULL)
        {
            $title = implode('%',str_split($request->title));
            $products->where('title', 'like', '%'.$title.'%');
        }

        if($request->category != 0)
        {
            $products->where('c.id', $request->category);
        }

        if($request->subcategory != 0)
        {
            $products->where('subcategory_id', $request->subcategory);
        }

        if($request->min_price != NULL)
        {
            $products->where('price', '>=', $request->min_price);
        }

        if($request->max_price != NULL)
        {
            $products->where('price', '<=', $request->max_price);
        }
        // return $products->get();
        return view('filterProducts')->with('products', $products->get());
    }
}
