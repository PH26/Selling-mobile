@extends('layouts.app')
<style>
    
    table tbody td{
        padding: .5em 1.5em;
    }
    .title{
        font-size: 1.5em;
        color: #3498DB;
    }
    table tbody td a:hover{
        text-decoration: none;
        font-weight: bold;
        color: red;
    }
    .profile{
        width: 30%;
        float: left;
    }
    .log{
        width: 65%;
        float: right;
    }
</style>
@section('title')
    {{'Home'}}
@stop
@section('content')
<div class="container" style="width: 100%">
    <div class="profile">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif 
        <table>
            <thead>
                <tr>
                    <th colspan="2" class="title">Profile</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>ID:</b></td>
                    <td>{{Auth::user()->id}}</td>
                </tr>
                <tr>
                    <td><b>Name:</b></td>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <td><b>Tel:</b></td>
                    <td>{{Auth::user()->tel}}</td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <td><a href="{{route('edit')}}">Edit</a></td>
                    <td><a href="{{route('change')}}">Change password</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="log">
        <table>
            <thead>
                <tr>
                    <th colspan="2" class="title">Orders</th>
                </tr>
            </thead>
            <tbody>
                <table class="table table-bordered table-hover" style="font-size: 95%">
                    <thead>
                        <tr>
                                <th>ID</th>
                                <th>Date</th>
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
                                <td>{{ $order->orderdate }}</td>
                                <td>{{ $order->tel }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->total }}</td>
                                <td>
                                    @if($order->status == 0)
                                        <span class="fa  fa-minus-square-o  fa-fw" 
                                                style="color:red"></span>
                                    @else
                                        <span class="fa fa-check-square-o fa-fw" 
                                                style="color:green"></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('details',$order->id)}}">View</a>
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
                {{ $orders->links() }}
            </tbody>
        </table>
    </div>
</div>
@endsection