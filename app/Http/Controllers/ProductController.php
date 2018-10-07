<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ProductController extends Controller
{

    public function list()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories= Category::all();
        return view('admin.products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'unique:products,name',
           'price'=>'numeric',
        ],
        [
            'name.unique'=>'Name already exists',
            'price.numeric'=>'Price must be numeric'
        ]);
        $product = Product::create($request->all());
        if($request->file('images')){
            foreach($request->file('images') as $image){
                $path=$image->store('images');
                $img= Image::create([
                    'url' =>$path, 
                    'product_id' => $product->id
                ]);
            }        
        }
        return redirect()->route('products.create')->with('success', 'Create a new product successfully');
    }

    public function search(Request $request)
    {
        $key = $request->get('keyword');
            if($key != ''){
                $products = Product::where('id', 'like', '%'.$key.'%')
                        ->orWhere('name', 'like', '%'.$key.'%')
                        ->orWhere('price', 'like', '%'.$key.'%')
                        ->orWhere('quantity', 'like', '%'.$key.'%')
                        ->orderBy('id', 'desc')->paginate(15);
            }
            else{
                $products = Product::orderBy('id', 'desc')->paginate(10);
            }
        return view('admin.products.index',compact('products'));
    }

    public function edit(Product $product)
    {
        $categories= Category::all();
        return view('admin.products.show',compact('product', 'categories'));
    }
    
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
           'price'=>'numeric',
        ],
        [
            'name.unique'=>'Name already exists',
            'price.numeric'=>'Price must be numeric'
        ]);
        $product->update($request->all());
        return redirect()->route('products.list')->with('success', 'Edit a product successfully');
    }

    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.list')->with('success', 'Delete a new product successfully');
    }
}
