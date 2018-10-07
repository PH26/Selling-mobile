@extends('layouts.master')
@section('content')
<style>
	.panel-heading{
		background: #00e68a;
		border-radius: 0;
		font-weight: bold;
		color: white;
	}

	.product-price{
		color: red;
		font-weight: bold;
		font-size: 150%;
		padding-top: 1em;
	}
	.buy-now{
		margin-top: 0.5em;
		border-radius: 0.3em;
		background: #ff751a;
		text-align: center;
		color:white;
	}
	.buy-now:visited p{
		color: white;
	}
	.buy-now:hover p{
		color: white;	
	}
	.buy-now:active p{
		color: white;
	}
	.col-md-2{
		font-weight: bold;
	}
	
</style>
   
<div class="col-md-12">
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
			<div class="col-md-2">Internal memory</div>
			<div class="col-md-5">{{$product->memory}}</div>
			<div class="col-md-5">{{$product2->memory}}</div>
			<hr>
			<div class="col-md-2">SIM</div>
			<div class="col-md-5">{{$product->sim}}</div>
			<div class="col-md-5">{{$product2->sim}}</div>
			<hr>
			<div class="col-md-2">Battery capacity</div>
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
				<a class="col-md-12 buy-now" href="#">
		      		<p style="font-weight: bold; font-size: 115%; padding-top: 0.3em;">BUY NOW</p>
					<p style="padding-bottom: 0.1em;">Delivery in a hour or get at the supermarket</p>
		      	</a>
			</div>
			<div class="col-md-5">
				<a class="col-md-12 buy-now" href="#">
		      		<p style="font-weight: bold; font-size: 115%; padding-top: 0.3em;">BUY NOW</p>
					<p style="padding-bottom: 0.1em;">Delivery in a hour or get at the supermarket</p>
		      	</a>
			</div>	
	      	
		</div>
	</div>
</div>     
@endsection 