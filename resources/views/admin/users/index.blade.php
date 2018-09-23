@extends('admin.layouts.master')
@section('content')
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Active</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->tel }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->user_type == App\User::ADMIN_TYPE)
                                            {{ 'Admin' }}
                                        @else
                                            {{ 'Customer' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->active == 1)
                                            <span class="fa fa-check-square-o fa-fw" 
                                                    style="color:green"></span>
                                        @else
                                            <span class="fa  fa-minus-square-o  fa-fw" 
                                                    style="color:red"></span>
                                        @endif
                                    </td>
                                    <td class="center">
                                        <i class="fa fa-trash-o  fa-fw"></i>
                                        <a href="{{route('users.destroy',$user)}}"> Delete</a>
                                    </td>
                                    <td class="center">
                                        <i class="fa fa-pencil fa-fw"></i> 
                                        <a href="{{route('users.edit',$user)}}">Edit</a>
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
        <!-- /#page-wrapper -->
@stop