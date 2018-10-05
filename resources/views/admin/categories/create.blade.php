@extends('admin.layouts.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert" style="background:#dff0d8; color:#4f844f" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif     
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-md-7" style="padding-bottom:50px">
                        <form action="{{ route('categories.store')}}" method="POST">
                          	@csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" required=""  name="name" 
                                    placeholder="Please enter category name" value="{{ old('name') }}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <hr>

                            <div class="form-group">
                                <a style="font-size: 18px;" href="{{route('categories.list')}}">Back to list</a>
                            </div> 
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop