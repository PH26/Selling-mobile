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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
           'name'=>'unique:products,name',
           'price'=>'numeric',
        ],
        [
            'name.unique'=>'Name already exists',
            'price.numeric'=>'Price must be numeric'
        ]);
        $product->update($request->all());
        return redirect()->route('products.list')->with('success', 'Edit a product successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.list')->with('success', 'Delete a new product successfully');
    }
}
