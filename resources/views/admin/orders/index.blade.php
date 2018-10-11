@extends('admin.layouts.master')
@section('content')            
<div class="container" style="width: 100%">
   <div class="panel panel-default">
        <div class="panel-heading">List Orders</div>
        <div class="panel-body">
            <div>            
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif        
            </div>
            <div class="table-responsive">
                <div class="col-md-12">
                    <div class="col-md-7">
                        <button class="btn btn-info btn-md" type="button">
                            <a href="{{route('orders.list')}}" style="color:white; font-weight: bold;">LIST ALL</a>                                
                        </button> 
                    </div>
                    <div class="col-md-5">
                        <form action="" method="GET">
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
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Tel</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->orderdate }}</td>
                                <td>{{ $order->tel }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>Detail</td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>    
   </div>
</div>          
@stop
