@extends('admin.layouts.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('users.update',$user)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label>ID:</label>
                                <label>{{$user->id}}</label>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{ $user->name }}"  placeholder="Please enter user name" />
                            </div>
                            <div class="form-group">
                                <label>Tel</label>
                                <input class="form-control" name="tel" value="{{ $user->tel }}"  placeholder="Please enter user tel" />
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <label>{{$user->email}}</label>
                            </div>
                            <div class="form-group">
                                <label>Type:</label>
                                <label>{{ $user->user_type }}</label>
                            </div>
                            <div class="form-group">
                                <label>Active:</label>
                                <label>
                                    @if($user->active == 1)
                                        <span class="fa fa-check-square-o fa-fw" 
                                                style="color:green"></span>
                                    @else
                                        <span class="fa  fa-minus-square-o  fa-fw" 
                                                style="color:red"></span>
                                    @endif
                                </label>
                            </div>
                           
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop