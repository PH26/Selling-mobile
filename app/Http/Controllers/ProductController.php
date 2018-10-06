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
        $products = Product::paginate(10);
        return view('admin.products.index')->with('products', $products);
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
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = Product::where('id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orWhere('price', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')->get();
            }
            else{
                $data = Product::orderBy('id', 'desc')->get();
            }
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $product = Product::find($row->id);
                    $img=asset('storage/'.$product->images[0]->url);
                    $delete='products/delete/'.$product->id;
                    $show='products/show/'.$product->id;
                    $output .= '
                                <tr>
                                    <td>'.$product->id.'</td>
                                    <td><img src="'.$img.'" width="80px"></td>
                                    <td>'.$product->name.'</td>
                                    <td>'.$product->price.'</td>
                                    <td>'.$product->category->name.'</td>
                                    <td>'.$product->quantity.'</td>
                                    <td>
                                        <i class="fa fa-pencil fa-fw"></i>
                                         <a href="'.$show.'">View</a>
                                    </td>
                                    <td>
                                        <i class="fa fa-trash-o  fa-fw"></i>
                                        <a href="'.$delete.'">Delete</a>
                                    </td>                                   
                                </tr>';
                }
            }
            else{
                $output =   '
                                <tr>
                                    <td align="center" colspan="5">No Data Found</td>
                                </tr>
                            ';
            }
            $data = array(
                            'table_data'  => $output,
                            'total_data'  => $total_row
                        );
            echo json_encode($data);
        }
    }

    public function show(Product $product)
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
