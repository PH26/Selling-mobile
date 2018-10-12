@extends('admin.layouts.master')
@section('content')
<style>
    .process{
        padding: 0.5em 1.4em;
        background: red;
        color: white;
    }
    .process:hover{
        color: white;
        background: blue;
    }

</style>            
<div class="container" style="width: 100%">
   <div class="panel panel-default">
        <div class="panel-heading">Order No.{{$id}} </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetails as $od)
                            <tr>
                                <td>{{ $od->id }}</td>
                                <td><img src="{{asset('storage/'.$od->product->images[0]->url)}}" width="80px">
                                <td>{{ $od->product->name }}</td>
                                <td>{{ $od->quantity }}</td>
                                <td>{{ $od->product->price*$od->quantity }}</td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>    
   </div>
</div>          
@stop
