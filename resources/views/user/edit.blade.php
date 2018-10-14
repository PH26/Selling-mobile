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
    input{
        border: none;
        border-bottom: 1px solid gray;
    }
</style>
@section('title')
    {{'Home'}}
@stop
@section('content')
<div class="container" style="width: 100%">
    <div class="profile">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif    
        <form action="{{route('update')}}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th colspan="2" class="title">Edit Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>ID:</b></td>
                        <td>{{Auth::user()->id}}</td>
                        <td><input type="hidden" name="id" value="{{Auth::user()->id}}"></td>
                    </tr>
                    <tr>
                        <td><b>Name:</b></td>
                        <td><input type="text" name="name" required="" value="{{Auth::user()->name}}"></td>
                    </tr>
                    <tr>
                        <td><b>Tel:</b></td>
                        <td><input type="text" name="tel" required="" value="{{Auth::user()->tel}}"></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td>{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <td><button type="reset" class="btn btn-success">Reset</button></td>
                        <td><button type="submit" class="btn btn-success">OK</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <a href="{{route('home')}}">Back to profile</a>       
    </div>
</div>
@endsection