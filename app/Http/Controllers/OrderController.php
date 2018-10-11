<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Detail;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $orders= Order::orderBy('status')->orderBy('orderdate')->paginate(20);
        return view('admin.orders.index',compact('orders'));
    }

    public function details($id)
    {
        $orderdetails= Order_Detail::where('order_id',$id)->get();
        return view('admin.orders.details',compact('orderdetails','id'));
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->status=1;
        $order->save();
        return redirect()->route('orders.list');
    }
    public function search(Request $request)
    {
        $key = $request->get('keyword');
            if($key != ''){
                $orders = Order::where('id', 'like', '%'.$key.'%')
                        ->orWhere('orderdate', 'like', '%'.$key.'%')
                        ->orWhere('tel', 'like', '%'.$key.'%')
                        ->orWhere('address', 'like', '%'.$key.'%')
                        ->orWhere('total', 'like', '%'.$key.'%')
                        ->orderBy('status')->orderBy('orderdate')->paginate(20);
            }
            else{
                $orders= Order::orderBy('status')->orderBy('orderdate')->paginate(20);
            }
        return view('admin.orders.index',compact('orders'));
    }

}
