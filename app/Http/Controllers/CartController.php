<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function cart() {
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
            return redirect()->route('cart.view');
        }
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
            return redirect()->route('cart.view');
        }
        if (Request::isMethod('get')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
            return redirect()->route('cart.view');
        }
        
    }
    public function view() {
        $cart = Cart::content();
        return view('pages.cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }
    public function destroy() {
        Cart::destroy();
        return redirect()->route('cart.view');
    }
    public function remove() {
        $rows = Cart::search(function($key, $value) {
            return $key->id == Request::get('product_id');
        });
        $item = $rows->first();
        Cart::remove($item->rowId);
        return redirect()->route('cart.view');
    }
}
