@extends('layouts.master')
@section('content')
    <style>
        #heading{
            height: 3em;
        }
        .category{
            font-weight: bold;
            font-size: 100%;
        }
        .thumbnail{
            height: 21em;
        }
        .thumbnail img{
            width: 70%;
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
        .thumbnail:hover{
            border: 2px solid #00e68a;         
        }
        .thumbnail:hover img{
            -webkit-transform: scale(1.04);
            -moz-transform: scale(1.04);
            -ms-transform: scale(1.04);
            transform: scale(1.04);
            -webkit-transition: transform 0.5s; 
            transition: transform 0.5s; 
        }
        .pagination{
            display: inline-flex;
            width: 50%;
        }
    </style>
    <div class="panel">

        <div class="panel-heading" id="heading">
            @if(isset($category))
                <div class="col-md-12 category">{{ strtoupper($category->name)}}</div>
            @else
               <div class="col-md-12 category">ALL</div>
            @endif
        </div>
        <div class="panel-body">
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
            <div class="col-md-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    
    <div class="panel">
        <div class="panel-heading" id="heading">
            <div class="col-md-12 category">NEW</div>
        </div>
        <div class="panel-body">
            @foreach($newproduct as $product)
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
        </div>
    </div>              
@endsection 