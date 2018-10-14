@extends('layouts.app')
<style>
    
    table tbody td{
        padding: .5em 1.5em;
        text-align: right;
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
        width: 60%;
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
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif 
        <form action="{{route('home')}}" method="GET" >
            @csrf
            <table>
                <thead>
                    <tr>
                        <th colspan="2" class="title">Change Password</th>
                        <td><input type="hidden" name="id" value="{{Auth::user()->id}}"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Password:</b></td>
                        <td><input type="password" name="password" required=""></td>
                    </tr>
                    <tr>
                        <td><b>New password:</b></td>
                        <td><input type="password" name="pass" required=""></td>
                    </tr>
                    <tr>
                        <td><b>Confirm password:</b></td>
                        <td><input type="password" name="repass" required=""></td>
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