<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order_Detail;

class PageController extends Controller
{

    public function __construct(){
        $categories = Category::all();
        $newproduct = Product::orderBy('id', 'desc')->take(6)->get();
        $best = Product::orderBy('sale', 'desc')->take(6)->get();
        view()->share('categories',$categories);
        view()->share('newproduct',$newproduct);
        view()->share('best',$best);
    }
    
    public function index()
    {
        $products = Product::paginate(12);;  
        return view('pages.index',compact('products'));
    }

    public function category($id)
    {
        $products = Product::where('category_id',$id)->paginate(12);
        $category = Category::find($id);
        return view('pages.index', compact('products','category'));
    }

    public function product(Product $product)
    {
        $sameproduct = Product::where('price','>',$product->price-3000000)
                            ->where('price', '<',$product->price+3000000)
                            ->where('id','<>',$product->id)->take(6)->get();
        return view('pages.product', compact('product','sameproduct'));
    }

    public function compare(Product $product , Product $product2)
    {
        return view('pages.compare', compact('product','product2'));

    }
}
