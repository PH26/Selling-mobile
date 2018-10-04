@extends('layouts.master')
@section('content')
    <style>
        .thumbnail img{
            height: 15em;
            width: 90%;
            object-fit: cover;
        }
        b{
            color: red;
        }
        .caption a{
            text-decoration: none;
            color: black;
        }
        .caption a:hover{
            text-decoration: none;
            color: #288ad6;
        }
        .thumbnail:hover img{
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transition: transform 0.5s; 
            transition: transform 0.5s; 
        }
    </style>
    
    @foreach($products as $product)
        <div class="col-md-3">
            <div class="thumbnail">
                <a href="{{route('product',$product)}}"><img src="{{asset('storage/'.$product->images[0]->url)}}"></a>
                <div class="caption">
                    <p><a href="{{route('product',$product)}}">{{ $product->name }}</a></p>
                    <p><b>{{ number_format($product->price,0, '', '.')}}₫</b></p>
                    <button class="btn btn-success">
                        <span class="fa fa-shopping-cart fa-1x"> Add to cart</span> 
                    </button>
                </div>
            </div>
        </div>
    @endforeach 
@endsection 