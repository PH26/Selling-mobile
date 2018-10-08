<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
                            ['name'=>'unique:categories,name'],
                            ['name.unique'=> $request->name.' already exists']
                        );
        $category = Category::create($request->all());
        return redirect()->route('categories.create')->with('success', 'Create a new category successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $key = $request->get('keyword');
            if($key != ''){
                $categories = Category::where('id', 'like', '%'.$key.'%')
                        ->orWhere('name', 'like', '%'.$key.'%')
                        ->orderBy('id', 'desc')->paginate(10);
            }
            else{
                $categories = Category::orderBy('id', 'desc')->paginate(10);
            }
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,
                            ['name'=>'unique:categories,name'],
                            ['name.unique'=> $request->name.' already exists']
                        );
       $category->update($request->all());
       return redirect()->route('categories.list')->with('success', 'Edit a category successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $category = Category::find($id);
        $size = count($category->products);
        if ($size == 0) {
            $category->delete();
            return redirect()->route('categories.list')->with('success', 'Delete a new category successfully');
        }
        return redirect()->route('categories.list')->with('error', 'Cannot delete!');
        
    }
}
