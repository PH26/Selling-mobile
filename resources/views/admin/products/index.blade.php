@extends('admin.layouts.master')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-md-12">
                            @if (session('success'))
                                <div class="alert" style="background:#dff0d8; color:#4f844f" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif     
                        </div>
                    <div class="col-md-4 col-md-offset-8">
                        <form action="#" method="GET">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    @csrf
                                    <input type="text" class="form-control input-md" placeholder="Search..." />
                                    <span class="input-group-btn">
                                    <button class="btn btn-info btn-md" type="button">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                    </span>                                                                
                                </div>
                            </div>
                        <form> 
                    </div>                       
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Warranty</th>
                                <th>Delete</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($products as $product)
								<tr>
	                                <td>{{ $product->id }}</td>
	                                <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->warranty }}</td>
	                                <td class="center">
                                        <i class="fa fa-trash-o  fa-fw"></i>
                                        <a href="{{ route('products.destroy',$product)}}">Delete</a>
                                    </td>
	                                <td class="center">
                                        <i class="fa fa-info fa-fw"></i> 
                                        <a href="{{route('products.edit',$product)}}">View details</a>
                                    </td>
	                            </tr>
                        	@endforeach                        
                        </tbody>
                        {{ $products->links() }}
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@stop