<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Auth;
use App\Product;
use App\Order;
use App\Order_Detail;

class CartController extends Controller
{
    public function cart() {
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
            return redirect()->back();
        }
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
            return redirect()->back();
        }
        if (Request::isMethod('get')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
            return redirect()->back();
        }
        
    }
    public function view() {
        $cart = Cart::content();
        return view('pages.cart', array('cart' => $cart));
    }
    public function remove() {
        $rows = Cart::search(function($key, $value) {
            return $key->id == Request::get('product_id');
        });
        $item = $rows->first();
        Cart::remove($item->rowId);
        return redirect()->back();
    }
    public function destroy() {
        Cart::destroy();
        return redirect()->back();;
    }
    public function order() {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        else{
            $cart = Cart::content();
            return view('pages.order',compact('cart'));
        }
    }
    public function pay() {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->orderdate =  date('Y-m-d');
        $order->tel = Request::get('tel');
        $order->address = Request::get('address');
        $order->total = Cart::subtotal();
        $order->save();
        $cart = Cart::content();
        foreach($cart as $item){
            $detail = new Order_Detail();
            $detail->order_id = $order->id;
            $detail->product_id = $item->id;
            $detail->quantity = $item->qty;
            $detail->save();
        }
        Cart::destroy();
        return redirect()->route('index');
    }
}
