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
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index',compact('users'));
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
        $key = $request->get('keyword');
            if($key != ''){
                $users = User::where('id', 'like', '%'.$key.'%')
                        ->orWhere('name', 'like', '%'.$key.'%')
                        ->orWhere('tel', 'like', '%'.$key.'%')
                        ->orWhere('email', 'like', '%'.$key.'%')
                        ->orderBy('id', 'desc')->paginate(20);
            }
            else{
                $users = User::orderBy('id', 'desc')->paginate(10);
            }
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
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

    public function login(Request $request)
    {   
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'user_type'=>0])) {
            return redirect()->route('home');          
        }else{
            return redirect()->route('login')->with('error', 'Incorrect information!!!');
        }
    }
}
