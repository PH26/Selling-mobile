@extends('layouts.master')
@section('content')
<style>
    .index{      
        width: 99.8%;
        margin:0 auto;
        font-family: 'Lato', sans-serif;
    }
    .index .title{
        font-weight: bold;
        font-size: 250%;
        border-bottom: 1px solid #f2eded;
        padding:0.5em;
        text-align: center;
    }
    .index .card{
        width: 31%;
        border:1px solid #f2eded;
        height: 9em;
        padding: 1em;
        margin: 1em;

    }
    .index .card:hover{
        border:0.1px solid #3498DB;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: box-shadow 0.5s; 
    }
    .index .card:hover img{
        opacity: 0.8;
    }
    .index .card .name{
        font-weight: bold;
        font-size: 125%;
    }
    .index .card .price{
        font-size: 120%;
        color: red;
        display: inline;
        font-weight: bold;
    }
    .index .card .cart-plus{
        color: #a0c864;
        cursor: pointer;
    }
    .index .card a{
        color: black;
    }
    .index .card a:hover {
        color: #2196F3;
        text-decoration: none;
    }
    .index .add-to-cart{
        border:none;
        background: transparent;
    }
</style>
<div class="col-md-12 index">
    <div class="col-md-12 title">
        @if(isset($category))
            {{ strtoupper($category->name)}}           
        @else
            Prominent phones
        @endif   
    </div>
    @foreach($products as $product)
        <div class="col-md-4 card">
            <a href="{{route('product',$product)}}">
                <img class="col-md-4 image" src="{{asset('storage/'.$product->images[0]->url)}}">
            </a>
            <div class="col-md-6">
                @if($product->quantity == 0)
                    <div style="background: red; display: inline; color: white; padding: 0.2em 1em;" >Out of product</div>
                @else
                    <div>Quantity: {{$product->quantity}}</div>
                @endif
                <a href="{{route('product',$product)}}">
                    <p class="name">{{$product->name}}</p>
                </a>
                <p class="price">{{ number_format($product->price,0, '', '.')}}₫</p>
            </div>
            <div class="col-md-2">
                @if($product->quantity > 0)
                    <form method="GET" action="{{route('cart')}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="add-to-cart">
                            <img src="{{asset('dist/img/cart.png')}}">
                        </button>
                    </form>
                @endif                      
            </div>        
        </div>
    @endforeach  
</div>

<div class="col-md-12 index" style="margin-top: 2em;">
    <div class="col-md-12 title">
        News phones
    </div>
    @foreach($newproduct as $product)
        <div class="col-md-4 card">
            <a href="{{route('product',$product)}}">
                <img class="col-md-4 image" src="{{asset('storage/'.$product->images[0]->url)}}">
            </a>
            <div class="col-md-6">
                @if($product->quantity == 0)
                    <div style="background: red; display: inline; color: white; padding: 0.2em 1em" >Out of product</div>
                @else
                    <div>Quantity: {{$product->quantity}}</div>
                @endif
                <a href="{{route('product',$product)}}">
                    <p class="name">{{$product->name}}</p>
                </a>
                <p class="price">{{ number_format($product->price,0, '', '.')}}₫</p>
            </div>
            <div class="col-md-2">
                @if($product->quantity > 0)
                    <form method="GET" action="{{route('cart')}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="add-to-cart">
                            <img src="{{asset('dist/img/cart.png')}}">
                        </button>
                    </form>
                @endif                      
            </div>              
        </div>
    @endforeach  
</div>

<div class="col-md-12 index" style="margin-top: 2em;">
    <div class="col-md-12 title">
        Best Seller
    </div>
    @foreach($best as $product)
        <div class="col-md-4 card">
            <a href="{{route('product',$product)}}">
                <img class="col-md-4 image" src="{{asset('storage/'.$product->images[0]->url)}}">
            </a>
            <div class="col-md-6">
                @if($product->quantity == 0)
                    <div style="background: red; display: inline; color: white; padding: 0.2em 1em" >Out of product</div>
                @else
                    <div>Quantity: {{$product->quantity}}</div>
                @endif
                <a href="{{route('product',$product)}}">
                    <p class="name">{{$product->name}}</p>
                </a>
                <p class="price">{{ number_format($product->price,0, '', '.')}}₫</p>
            </div>
            <div class="col-md-2">
                @if($product->quantity > 0)
                    <form method="GET" action="{{route('cart')}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="add-to-cart">
                            <img src="{{asset('dist/img/cart.png')}}">
                        </button>
                    </form>
                @endif                      
            </div>              
        </div>
    @endforeach  
</div>

@stop