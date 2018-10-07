@extends('layouts.master')
@section('content')
<style>
	
	.product-name{
		font-weight: bold;
	}
	.product-price{
		color: red;
		font-weight: bold;
		font-size: 200%;
	}
	.properties{
		border-top:1px solid #d1e0e0; 
		border-bottom:1px solid #d1e0e0;
		font-size: 90%;
		padding: 0.5em 0;
	}
	.super{
		height: 30em;
	}
	.super .item{
		width: 60%;
		object-fit: cover;
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
	.thumbnail{
        height: 23em;
    }
    .thumbnail img{
        width: 70%;
        object-fit: cover;
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
    .col-md-4{
    	font-weight: bold;
    }
</style>
   
<div class="col-md-12">
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
					<div class="col-md-8 product-price">{{ number_format($product->price,0, '', '.')}}₫</div>
					<div class="col-md-4">
						<button class="btn btn-success">
                            <span class="fa fa-shopping-cart fa-1x"> Add to cart</span> 
                        </button>
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
		      		<div class="col-md-4">Internal memory:</div>
		      		<div class="col-md-8">{{$product->memory}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">SIM:</div>
		      		<div class="col-md-8">{{$product->sim}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">Battery capacity:</div>
		      		<div class="col-md-8">{{$product->pin}}</div>
		      	</div>
		      	<div class="row properties">
		      		<div class="col-md-4">Warranty:</div>
		      		<div class="col-md-8">{{$product->warranty}} months</div>
		      	</div>
		      	<a class="col-md-12 buy-now" href="#">
		      		<p style="font-weight: bold; font-size: 115%; padding-top: 0.3em;">BUY NOW</p>
					<p style="padding-bottom: 0.1em;">Delivery in a hour or get at the supermarket</p>
		      	</a>
			</div>
	    </div>
	</div>
	@if(count($sameproduct)>0)
		<div class="panel">
	    	<div class="panel-heading">COMPARE WITH SIMILAR PRODUCTS</div>
		    <div class="panel-body">
		        @foreach($sameproduct as $item)
	                <div class="col-md-3">
	                    <div class="thumbnail">
	                        <a href="{{route('product',$item)}}"><img src="{{asset('storage/'.$item->images[0]->url)}}"></a>
	                        <div class="caption">
	                            <p><a href="{{route('product',$item)}}">{{ $item->name }}</a></p>
	                            <p><b style="color: red;">{{ number_format($item->price,0, '', '.')}}₫</b></p>
	                            <button class="btn btn-success" style="margin-bottom: 1em;">
	                                <span class="fa fa-shopping-cart fa-1x"> Add to cart</span> 
	                            </button>
	                            <a href="{{route('compare',[$product, $item]) }}" style="border:none; color:blue; font-weight:normal; margin:2em;">
	                            	Detailed comparison
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            @endforeach
		    </div>
		</div>       
	@endif       
</div>
@endsection 