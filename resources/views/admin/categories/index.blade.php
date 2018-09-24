@extends('admin.layouts.master')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-md-4 col-md-offset-8">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control input-md" placeholder="Search..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-md" type="button">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif     
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($categories as $category)
								<tr>
	                                <td>{{ $category->id }}</td>
	                                <td>{{ $category->name }}</td>
	                                <td class="center">
                                        <i class="fa fa-trash-o  fa-fw"></i>
                                        <a href="{{ route('categories.destroy',$category)}}">Delete</a>
                                    </td>
	                                <td class="center">
                                        <i class="fa fa-pencil fa-fw"></i> 
                                        <a href="{{route('categories.edit',$category)}}">Edit</a>
                                    </td>
	                            </tr>
                        	@endforeach                        
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@stop