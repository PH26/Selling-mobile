<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_Detail;
use App\Product;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('status')->orderBy('orderdate')->orderBy('id','desc')->paginate(10);
        return view('home',compact('orders'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $this->validate($request,[
           'tel'=>'numeric',
        ],
        [
            'tel.numeric'=>'Tel must be numeric'
        ]);
        $user->update($request->all());
        return redirect()->route('home')->with('success', 'Edit a user successfully');;
    }

    public function change()
    {
        return view('user.change');
    }
    public function details($id)
    {
        $orderdetails = Order_Detail::where('order_id',$id)->get();
        return view('user.details',compact('orderdetails','id'));
    }
}
