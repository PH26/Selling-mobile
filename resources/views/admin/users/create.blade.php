@extends('admin.layouts.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('users.store')}}" method="POST">
                          	@csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" required=""  name="name" 
                                    placeholder="Please enter user name" />
                            </div>
                            <div class="form-group">
                                <label>Tel</label>
                                <input class="form-control" required=""  name="tel" 
                                    placeholder="Please enter user tel" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" required=""  name="email" 
                                    placeholder="Please enter user email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" required=""  name="password" 
                                    placeholder="Please enter user password" />
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select name="user_type">
                                	<option value="0">Customer</option>
                                	<option value="1">Admin</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            <hr>

                            <div class="form-group">
                                <a style="font-size: 18px;" href="{{route('users.list')}}">Back to list</a>
                            </div> 
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop