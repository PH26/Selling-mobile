<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class PageController extends Controller
{

    public function __construct(){
        $categories = Category::all();
        view()->share('categories',$categories);
    }
    
    public function index()
    {
        $products = Product::paginate(12);;  
        return view('pages.index',compact('products'));
    }

    public function category($id)
    {
        $products = Product::where('category_id',$id)->paginate(12);
        return view('pages.category', compact('products'));
    }

    public function product(Product $product)
    {
        return view('pages.product', compact('product'));
    }
}
