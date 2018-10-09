@extends('layouts.master')
@section('content')
<style>
    .index{      
        margin:0 auto;
    }
    .index .title{
        font-weight: bold;
        font-size: 130%;
        border-bottom: 1px solid #f2eded;
        padding:0.4em 0;
        margin-left: 1em;
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
    .index .card .rating{
        color: yellow; 
        font-size: 1.5em; 
        font-weight: bold;
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
</style>
@include('layouts.slide')
<div class="col-md-12 index">
    <div class="col-md-12 title">
        @if(isset($category))
            {{ strtoupper($category->name)}}           
        @else
            Prominent phone
        @endif   
    </div>
    @foreach($products as $product)
        <div class="col-md-4 card">
            <a href="{{route('product',$product)}}">
                <img class="col-md-4 image" src="{{asset('storage/'.$product->images[1]->url)}}">
            </a>
            <div class="col-md-7">
                <p class="rating">* * * * *</p>
                <a href="{{route('product',$product)}}">
                    <p class="name">{{$product->name}}</p>
                </a>
                <p class="price">{{ number_format($product->price,0, '', '.')}}₫</p>
            </div>
            <div class="col-md-1">
                <i class="fa fa-shopping-cart fa-2x cart-plus"></i>            
            </div>            
        </div>
    @endforeach  
</div>

<div class="col-md-12 index" style="margin-top: 2em;">
    <div class="col-md-12 title">
        Latest phone
    </div>
    @foreach($newproduct as $product)
        <div class="col-md-4 card">
            <a href="{{route('product',$product)}}">
                <img class="col-md-4 image" src="{{asset('storage/'.$product->images[1]->url)}}">
            </a>
            <div class="col-md-7">
                <p class="rating"></p>
                <a href="{{route('product',$product)}}">
                    <p class="name">{{$product->name}}</p>
                </a>
                <p class="price">{{ number_format($product->price,0, '', '.')}}₫</p>
            </div>
            <div class="col-md-1">
                <i class="fa fa-shopping-cart fa-2x cart-plus"></i>
            </div>            
        </div>
    @endforeach  
</div>