<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
           'email'=>'unique:users,email',
           'tel'=>'numeric',
        ],
        [
            'email.unique'=>'Email already exists',
            'tel.numeric'=>'Tel must be numeric'
        ]);
        $user = User::create($request->all());
        $user->password = bcrypt($user->password);
        $user->save();
        return redirect()->route('users.create')->with('success', 'Create a new user successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = User::where('id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orWhere('tel', 'like', '%'.$query.'%')
                        ->orWhere('email', 'like', '%'.$query.'%') 
                        ->orWhere('user_type', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')->get();
            }
            else{
                $data = User::orderBy('id', 'desc')->get();
            }
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $user = User::find($row->id);
                    
                    $type = 'Admin';
                    if($user->user_type == 0)
                        $type = 'Customer';

                    $active = '<span class="fa fa-check-square-o fa-fw" style="color:green"></span>';
                    if($row->active == 0)
                        $active = '<span class="fa  fa-minus-square-o  fa-fw" style="color:red"></span>';

                    $delete='users/delete/'.$user->id;
                    $edit='users/edit/'.$user->id;

                    $output .= '
                                <tr>
                                    <td>'.$user->id.'</td>
                                    <td>'.$user->name.'</td>
                                    <td>'.$user->tel.'</td>
                                    <td>'.$user->email.'</td>
                                    <td>'.$type.'</td>
                                    <td>'.$active.'</td>
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
           'email'=>'unique:users,email',
           'tel'=>'numeric',
        ],
        [
            'email.unique'=>'Email already exists',
            'tel.numeric'=>'Tel must be numeric'
        ]);
        $user->update($request->all());
        return redirect()->route('users.list')->with('success', 'Edit a user successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.list')->with('success', 'Delete a user successfully');
    }
}
