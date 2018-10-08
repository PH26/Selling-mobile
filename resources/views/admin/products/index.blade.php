@extends('admin.layouts.master')
@section('content')            
<div class="container">
   <div class="panel panel-default">
        <div class="panel-heading">List Products</div>
        <div class="panel-body">
            <div>            
                @if (session('success'))
                    <div class="alert" style="background:#dff0d8; color:#4f844f" role="alert">
                        {{ session('success') }}
                    </div>
                @endif     
            </div>
            <div class="table-responsive">
                <div class="col-md-12">
                    <div class="col-md-7">
                        <button class="btn btn-info btn-md" type="button">
                            <a href="{{route('products.list')}}" style="color:white; font-weight: bold;">LIST ALL</a>                                
                        </button> 
                    </div>
                    <div class="col-md-5">
                        <form action="{{route('products.search')}}" method="GET">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    @csrf
                                    <input type="text" class="form-control input-md" placeholder="Search..." name="keyword" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-info btn-md" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                    </span>                                                                
                                </div>
                            </div>
                        <form> 
                    </div>
                </div>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Details</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                   <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{asset('storage/'.$product->images[0]->url)}}" width="80px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>                              
                                <td>
                                    <a href="{{ route('products.edit',$product)}}">
                                        <i class="fa fa-pencil fa-fw" style="color:black"></i>
                                    </a>
                                </td>
                                <td class="center">
                                    <button type="button" value="{{$product->id}}" class="btn btn-danger">
                                        <i class="fa fa-trash-o  fa-fw" style="color:black"></i>
                                    </button>                                  
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>      
                </table>
                {{ $products->links()}}
            </div>
        </div>    
   </div>
</div>          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var button = $('.btn-danger');
    button.click(function(){
        if (confirm("Do you want to delete?")) {
            var url = '{{ route("products.destroy", ":id") }}';
            url = url.replace(':id', $(this).val());
            window.location.href=url;
        }
    });
});
</script>
@stop
