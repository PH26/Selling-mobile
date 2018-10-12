@extends('layouts.app')
<style type="text/css">
    .cart{
        background: white;
        font-family: 'Lato', sans-serif;
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
    /*------------------------------------*/
	.bill .panel-heading{
		font-size: 170%;
		color: #3498DB;
		font-weight: bold;
		padding: .3em .5em;
		text-align: center;
		border-bottom: 1px solid grey;
		margin-bottom: .55em;
	}
	.bill .panel-body{
		padding: 0 1em; 
	}
	.bill .panel-body label{
		font-weight: bold;
		font-size: 1.1em;
	}
	.bill .panel-body input{
		border: none;
		border-bottom: 1px solid gray;
		background: white;
	}
	.pay, .back {
        color: white;
        background: #3498DB;
        padding:0.5em 2em;
        float: right;
        margin-left: 1em;
        cursor: pointer;
    }
    .pay{
    	border: none;
    }
    .pay:hover , .back:hover{
        text-decoration: none;
        color:white;
        background: red;
    }
</style>
@section('title')
    Shopping cart
@stop
@section('content')
<div class="container bill">
	<div class="row">
		@if (session('success'))
            <div class="col-md-12 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            <div class="col-md-12">
            	<a href="{{route('index')}}">Back to homepage</a>
            </div>          
		@elseif(session('error'))
			<div class="col-md-12 alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            <div class="col-md-12">
            	<a href="{{route('cart.view')}}">Back to cart</a>
            </div> 
		@else
		<div class="col-md-7 cart">
	        <table class=" table table-bordered">
	            <thead>
	                <tr>
	                    <th>Image</th>
	                    <th>Name</th>
	                    <th>Price</th>
	                    <th>Amount</th>
	                    <th>Total</th>
	                </tr>
	            </thead>
	            <tbody>
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
	                    <td class="cart_quantity">{{$item->qty}}</td>
	                    <td class="cart_total">
	                        <p class="cart_total_price">{{ number_format($item->subtotal,0, '', '.')}}₫</p>
	                    </td>
	                </tr>
	                @endforeach
	                <tr class="sum">
	                    <td colspan="4">Total</td>
	                    <td colspan="2" style="color: red">{{Cart::subtotal()}}₫</td>
	                </tr>           
	            </tbody>       
	        </table>
		</div>
		<div class="col-md-5">
			<div class="panel">
			  	<div class="panel-heading">Customer Information</div>
			  	<div class="panel-body">
			    	<form action="{{route('cart.pay')}}" method="POST">
			    		@csrf
			    		<div class="form-group">
						    <label for="name">Name</label>
						    <input type="text" class="form-control" id="name" 
						    	disabled value="{{Auth::user()->name}}">
						</div>
			    		<div class="form-group">
						    <label for="tel">Tel<span style="color: red">*</span></label>
						    <input type="text" required="" class="form-control" id="tel" name="tel">
						</div>
						<div class="form-group">
						    <label for="address">Address<span style="color: red">*</span></label>
						    <input type="text" required="" class="form-control" id="address" name="address">
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="{{route('cart.view')}}"><div class="back">BACK TO CART</div></a>
							</div>
							<div class="col-md-6">
								<button type="submit" class="pay">
									PAY
								</button>
							</div>
						</div>
		    		</form>
			  	</div>
			</div>
		</div>
		@endif
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
@endsection