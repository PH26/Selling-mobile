@extends('layouts.app')
<style type="text/css">
    .cart{
        background: white;
    }
    .cart *{
        text-align: center;
    }
    .cart thead{
        background: #3498DB;
        color:white;
    }
    .price{
        color: red;
        font-weight: bold;
    }

    .cart_total{
        color: red;
        font-weight: bold;
    }
    .cart_name{
        font-size: 1.25em;
        text-decoration: none;
        color: black;
    }
    .cart_name:hover{
        text-decoration: none;
        color: #3498DB;
        background: 
    }
    .total{
        font-weight: bold;
        font-size: 1.20em;
        background: red;
    }
    .sum *{
        text-align: right;
        font-size: 1.1em;
        font-weight: bold;
    }
    .order, .empty {
        color: white;
        background: #3498DB;
        padding:0.5em 2.1em;
        float: right;
        margin-left: 1em;
        cursor: pointer;
    }
    .order:hover , .empty:hover{
        text-decoration: none;
        color:white;
        background: red;
    }
    .order a{
        color: white;
    }
    .order a:hover{
        text-decoration: none;
        color: white;
    }
    .btn-default:hover{
        background: red;
    }
    .action{  
        background: white;      
        border:1px solid black;
    }
    .action:hover{
        border-radius: 0;
        border:1px solid;
        color:red;
    }
</style>
@section('title')
    Shopping cart
@stop
@section('content') 
<div class="container cart">
        <table class=" table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @if(count($cart))
                @foreach($cart as $item)
                <?php 
                    $product= App\Product::find($item->id);
                 ?>
                <tr>
                    <td><a href="{{route('product',$product)}}">
                        <img src="{{asset('storage/'.$product->images[0]->url)}}" width="60px">
                    </a></td>
                    <td>
                        <p><a class="cart_name" href="{{route('product',$product)}}">
                            {{$product->name}}
                        </a></p>
                    </td>
                    <td class="cart_price price">
                        <p>{{ number_format($product->price,0, '', '.')}}₫</p>
                    </td>
                    <td class="cart_quantity">
                        <p>{{$product->quantity}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="btn-group">
                            <a class="cart_quantity_up" href='{{url("cart?product_id=$item->id&increment=1")}}'> 
                                <button type="button" class="btn action">+</button>
                            </a>
                          
                          <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">

                            <a class="cart_quantity_down" href='{{url("cart?product_id=$item->id&decrease=1")}}'>
                                <button type="button" class="btn action">-</button>
                            </a>
                          
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{ number_format($item->subtotal,0, '', '.')}}₫</p>
                    </td>
                    <td>
                        <form method="GET" action="{{route('cart.remove')}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit"class="btn btn-default" 
                                onclick="return confirm('Do you want to remove?')">
                                <i class="fa fa-trash-o  fa-2x" style="color:black"></i>
                            </button> 
                        </form>
                                                         
                    </td>
                </tr>
                @endforeach
                <tr class="sum">
                    <td colspan="5">Total</td>
                    <td colspan="2" style="color: red">{{Cart::subtotal()}}₫</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <a href="{{route('index')}}" 
                            style="float: left; font-size: 120%">Continue to buy
                        </a>
                        <div class="order"><a href="{{route('cart.order')}}">ORDER</a></div>
                        <div class="empty">EMPTY</div>
                    </td>
                </tr>
                @else
                    <tr><td colspan="7">You have no items in the shopping cart</td></tr>
                @endif               
            </tbody>       
        </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var button = $('.empty');
    button.click(function(){
        if (confirm("Do you want empty cart?")) {
            var url = '{{ route("cart.destroy") }}';
            window.location.href=url;
        }
    });
});
</script>   
@endsection