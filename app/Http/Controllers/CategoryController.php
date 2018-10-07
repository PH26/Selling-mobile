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
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
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
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = Category::where('id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')->get();
            }
            else{
                $data = Category::orderBy('id', 'desc')->get();
            }
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $category = Category::find($row->id);
                    $delete='categories/delete/'.$category->id;
                    $edit='categories/edit/'.$category->id;
                    $output .= '
                                <tr>
                                    <td>'.$category->id.'</td>
                                    <td>'.$category->name.'</td>
                                    <td>
                                        <i class="fa fa-trash-o  fa-fw"></i>
                                        <a href="'.$delete.'">Delete</a>
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil fa-fw"></i>
                                        <a href="'.$edit.'">Edit</a>
                                    </td>
                                </tr>';
                }
            }
            else{
                $output =   '
                                <tr>
                                    <td align="center" colspan="4">No Data Found</td>
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
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
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.list')->with('success', 'Delete a new category successfully');
    }
}
