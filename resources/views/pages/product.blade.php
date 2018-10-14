@extends('layouts.master')
@section('content')
<style>
	.index{      
        margin:0 auto;
        width: 99.69%;
        font-family: 'Lato', sans-serif;
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
        height: 11em;
        padding: 1em;
        margin: 1em;

    }
    .index .card:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: box-shadow 0.5s;
        border:0.1px solid #3498DB; 
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
	.fa-search{
		padding-bottom: 0.2em;
	}
	
	.panel-heading{
		font-weight: bold;
		font-size: 150%;
		margin-left: 2em;
		border-bottom: 2px solid #f2eded;
	}
	.product-price{
		color: red;
		font-weight: bold;
		font-size: 160%;
	}
	.properties{
		border-top:1px solid #d1e0e0; 
		border-bottom:1px solid #d1e0e0;
		font-size: 90%;
		padding: 0.5em 0;
		font-size: 110%;
	}
	.super{
		height: 20em;
		width: 80%;
	}
	.super .item{
		width: 70%;
		object-fit: cover;
	}
	.buy{
		background: #ff751a;
		text-align: center;
		color:white;
		padding: 0.5em;
		margin-bottom: 0.5em;
	}
	.buy:hover{
		text-decoration: none;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		color: white;
	}
	.add-cart{
		background: #63ac34;
		text-align: center;
		color:white;
		padding: 0.5em;
		margin-bottom: 0.5em;
		cursor: pointer;
	}
	.add-cart:hover{
		text-decoration: none;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		color: white;
	}
	.add-to-cart{
        border:none;
        background: transparent;
    }
</style>
   
<div class="col-md-12" style="width: 98%">
	<div class="panel">
    	<div class="panel-heading">{{ strtoupper($product->name) }}</div>
	    <div class="panel-body">
	        <div class="col-md-6">
				<div id="carousel-example-generic" class="carousel slide super" data-ride="carousel">
		 			<!-- Wrapper for slides -->
			  		<div class="carousel-inner" role="listbox">
				  		<?php $i=1 ?>
				  		@foreach($product->images as $image)
				  			@if($i==1)
				  				<div class="item active">
					      			<img src="{{asset('storage/'.$image->url)}}">
					    		</div>
					    	@else
					    		<div class="item">
				      				<img src="{{asset('storage/'.$image->url)}}">
				    			</div>
				  			@endif
				  			<?php $i++ ?>
				  		@endforeach
				 	</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4 product-price">{{ number_format($product->price,0, '', '.')}}₫</div>
					<div class="col-md-8">
						@if($product->quantity == 0)					
			                    <div style="background: red; display: inline; color: white; padding: 0.2em 1em" >Out of product</div>
			            @else
			            	<div class="col-md-6">
			                	<form method="GET" action="{{route('cart')}}">
				                    <input type="hidden" name="product_id" value="{{$product->id}}">
				                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				                    <button type="submit" class="add-to-cart">
				                        <img src="{{asset('dist/img/cart.png')}}" style="width: 20%;">
				                    </button>
				                </form>		                						
							</div>
						@endif	                      
					</div>
				</div>	
		      	
		      	<div class="row properties">
		      		<div class="col-md-4">Screen:</div>
		      		<div class="col-md-8">{{$product->screen}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">OS:</div>
		      		<div class="col-md-8">{{$product->os}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">Camera:</div>
		      		<div class="col-md-8">{{$product->camera}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">Front camera:</div>
		      		<div class="col-md-8">{{$product->frontcamera}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">CPU:</div>
		      		<div class="col-md-8">{{$product->cpu}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">RAM:</div>
		      		<div class="col-md-8">{{$product->ram}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">Memory:</div>
		      		<div class="col-md-8">{{$product->memory}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">SIM:</div>
		      		<div class="col-md-8">{{$product->sim}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">PIN:</div>
		      		<div class="col-md-8">{{$product->pin}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">Warranty:</div>
		      		<div class="col-md-8">{{$product->warranty}} months</div>
		      	</div>
			</div>
	    </div>
	</div>
	@if(count($sameproduct)>0)
		<div class="col-md-12 index" style="margin-top: 2em;">
		    <div class="col-md-12 title">
		        Compare with similar phone
		    </div>
		    @foreach($sameproduct as $item)
		        <div class="col-md-4 card">
		            <a href="{{route('product',$item)}}">
		                <img class="col-md-4 image" src="{{asset('storage/'.$item->images[0]->url)}}">
		            </a>
		            <div class="col-md-6">
		                @if($item->quantity == 0)
		                    <div style="background: red; display: inline; color: white; padding: 0.2em 1em" >Out of product</div>
		                @else
		                    <div>Quantity: {{$item->quantity}}</div>
		                @endif
		                <a href="{{route('product',$item)}}">
		                    <p class="name">{{$item->name}}</p>
		                </a>
		                <p class="price">{{ number_format($item->price,0, '', '.')}}₫</p>
		                <a href="{{route('compare',[$product, $item]) }}" style="color:blue;">
                        	Detailed comparison
                        </a>
		            </div>
		            <div class="col-md-2">
		            	@if($item->quantity > 0)
		                    <form method="GET" action="{{route('cart')}}">
			                    <input type="hidden" name="product_id" value="{{$item->id}}">
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
	@endif       
</div>
@endsection 