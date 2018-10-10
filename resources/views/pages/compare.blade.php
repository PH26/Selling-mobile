@extends('layouts.master')
@section('content')
<style>
	.fa-search{
		padding-bottom: 0.2em;
	}
	.compare{
		margin-top:7em;
		font-family: 'inherit', serif;
		font-size: 95%; 
	}
	.panel-heading{
		background: #3498DB;
		border-radius: 0;
		font-weight: bold;
		color: white;
	}

	.product-price{
		color: red;
		font-weight: bold;
		font-size: 130%;
		padding-top: 1em;
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
	
</style>
   
<div class="col-md-12 compare">
	<div class="panel">
    	<div>
    		<div class="col-md-2 panel-heading" style="padding-left: 2em;">Name</div>
			<div class="col-md-5 panel-heading">
				<a href="{{route('product',$product)}}" style="color: white">{{ strtoupper($product->name) }}</a>
			</div>
			<div class="col-md-5 panel-heading">
				<a href="{{route('product',$product2)}}" style="color: white">{{ strtoupper($product2->name) }}</a>
			</div>
    	</div>
	    <div class="panel-body">
    		<div class="col-md-2"><p class="product-price">Price</p></div>
			<div class="col-md-5"><p class="product-price">{{ number_format($product->price,0, '', '.')}}₫</p></div>
			<div class="col-md-5"><p class="product-price">{{ number_format($product2->price,0, '', '.')}}₫</p></div>
			<hr>
			<div class="col-md-2">Screen</div>
			<div class="col-md-5">{{$product->screen}}</div>
			<div class="col-md-5">{{$product2->screen}}</div>
			<hr>
			<div class="col-md-2">OS</div>
			<div class="col-md-5">{{$product->os}}</div>
			<div class="col-md-5">{{$product2->os}}</div>
			<hr>
			<div class="col-md-2">Camera</div>
			<div class="col-md-5">{{$product->camera}}</div>
			<div class="col-md-5">{{$product2->camera}}</div>
			<hr>
			<div class="col-md-2">Front camera</div>
			<div class="col-md-5">{{$product->frontcamera}}</div>
			<div class="col-md-5">{{$product2->frontcamera}}</div>
			<hr>
			<div class="col-md-2">CPU</div>
			<div class="col-md-5">{{$product->cpu}}</div>
			<div class="col-md-5">{{$product2->cpu}}</div>
			<hr>
			<div class="col-md-2">RAM</div>
			<div class="col-md-5">{{$product->ram}}</div>
			<div class="col-md-5">{{$product2->ram}}</div>
			<hr>
			<div class="col-md-2">Memory</div>
			<div class="col-md-5">{{$product->memory}}</div>
			<div class="col-md-5">{{$product2->memory}}</div>
			<hr>
			<div class="col-md-2">SIM</div>
			<div class="col-md-5">{{$product->sim}}</div>
			<div class="col-md-5">{{$product2->sim}}</div>
			<hr>
			<div class="col-md-2">PIN</div>
			<div class="col-md-5">{{$product->pin}}</div>
			<div class="col-md-5">{{$product2->pin}}</div>	
			<hr>
			<div class="col-md-2">Warranty</div>
			<div class="col-md-5">{{$product->warranty}}</div>
			<div class="col-md-5">{{$product2->warranty}}</div>		
			<hr>
			<div class="col-md-2">Image</div>
			<div class="col-md-3">
				<div id="carousel-example-generic" class="carousel slide super" data-ride="carousel">
		 			<!-- Wrapper for slides -->
		 			<a href="{{route('product',$product)}}">
		 				<div class="carousel-inner" role="listbox">
					  		<?php $a=1 ?>
					  		@foreach($product->images as $image)
					  			@if($a==1)
					  				<div class="item active">
						      			<img src="{{asset('storage/'.$image->url)}}">
						    		</div>
						    	@else
						    		<div class="item">
					      				<img src="{{asset('storage/'.$image->url)}}">
					    			</div>
					  			@endif
					  			<?php $a++ ?>
					  		@endforeach
					 	</div>
		 			</a>		  		
				</div>
			</div>
			<div class="col-md-3 col-md-offset-2">
				<div id="carousel-example-generic" class="carousel slide super" data-ride="carousel">
		 			<!-- Wrapper for slides -->
			  		<a href="{{route('product',$product2)}}">
		 				<div class="carousel-inner" role="listbox">
					  		<?php $i=1 ?>
					  		@foreach($product2->images as $image)
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
		 			</a>	
				</div>
			</div>
			<hr>
			<div class="col-md-5 col-md-offset-2">
				<div class="col-md-6">
					<p class="col-md-12 add-cart">BUY NOW</p>
				</div>
				<div class="col-md-4">
					<form method="GET" action="{{route('cart')}}">
	                    <input type="hidden" name="product_id" value="{{$product->id}}">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <button type="submit" class="add-to-cart" style="background: transparent; border: none;">
	                        <a class="col-md-12 buy" >ADD TO CART</a>
	                    </button>
	                </form>
					
				</div> 
			</div>
			<div class="col-md-5">
				<div class="col-md-6">
					<p class="col-md-12 add-cart">BUY NOW</p>
				</div>
				<div class="col-md-4">
					<form method="GET" action="{{route('cart')}}">
	                    <input type="hidden" name="product_id" value="{{$product2->id}}">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <button type="submit" class="add-to-cart" style="background: transparent; border: none;">
	                        <a class="col-md-12 buy" >ADD TO CART</a>
	                    </button>
	                </form>
				</div> 
			</div>	
	      	
		</div>
	</div>
</div>     
@endsection 