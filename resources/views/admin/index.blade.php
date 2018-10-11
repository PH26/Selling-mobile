@extends('admin.layouts.master')
@section('content')
	<div class="container" style="width: 100%;">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #f1f2c8">
                <h1 style="font-weight: bold; font-family: Arial; text-align: center;">
                    Welcome, {{Auth::user()->name}}.
                </h1>
                <p style="text-align: center; font-size: 1.40em;">What would you like to do today?</p>
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="border-bottom: 1.25px solid brown">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <p style="font-weight:bold;font-family:serif;font-size:1.15em">Total Users</p>
                            <p style="margin-left: 1em; color: #dd4b39; font-weight: bold">
                                {{count(App\User::all())}}
                            </p>
                        </div>
                        <div class="col-md-3">
                           <p style="font-weight:bold;font-family:serif;font-size:1.15em">Total Products</p>
                           <p style="margin-left: 1em; color: #dd4b39; font-weight: bold">
                               {{count(App\Product::all())}}
                           </p>
                        </div>
                        <div class="col-md-3">
                            <p style="font-weight: bold; font-family: serif; font-size: 1.15em">Total Orders</p>
                            <p style="margin-left: 1em; color: #dd4b39; font-weight: bold">
                                {{count(App\Order::all())}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p style="font-weight: bold; font-family: serif; font-size: 1.15em">Roles</p>
                            <p style="margin-left: 1em; color: #dd4b39; font-weight: bold">2</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="col-md-12">
                        <h3 style="font-weight:bold; font-family:serif;">Channels</h3>
                        <p style="font-size:1.15em">Manage the channels you use to communicate with customers via email and social media.</p>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div style="background-color: #ecf0f5; width: 15em; text-align: center; 
                            height: 12em">
                                <a href="#">
                                    <i class="fa fa-envelope fa-4x" style="padding: 0.55em 0"></i>
                                    <p style="font-size: 1.5em;">Email</p>
                                </a>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: #ecf0f5; width: 15em; text-align: center; 
                            height: 12em">
                                <a href="#">
                                    <i class="fa fa-facebook-square fa-4x" style="padding: 0.55em 0"></i>
                                    <p style="font-size: 1.15em">Facebook</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: #ecf0f5; width: 15em; text-align: center;
                            height: 12em">
                                <a href="#">
                                    <i class="fa fa-twitter fa-4x" style="padding: 0.55em 0"></i>
                                    <p style="font-size: 1.15em">Twitter</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 1em">
                        <div class="col-md-4"  style="float: right;">
                            <button type="button" class="btn btn-info btn-md" style="margin-left: 1em">
                                <i class="fa fa-twitter"></i>
                                <a href="#" style="color: white">Tweet</a>
                            </button>
                          <button type="button" class="btn btn-info btn-md" style="background-color:#3d578e; margin-left: .5em;">
                                <i class="fa fa-facebook-f"></i>
                                <a href="#" style="color: white">Share</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop