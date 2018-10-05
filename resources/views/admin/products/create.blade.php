@extends('admin.layouts.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Product
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
                    <div class="col-md-11" style="padding-bottom:50px">
                        <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                          	@csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required=""  name="name" value="{{ old('name') }}"
                                        placeholder="Please enter product name" />
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" required=""  name="price" 
                                        placeholder="Please enter price" value="{{ old('price') }}" /> 
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" type="number" min="1" required="" name="quantity"   
                                        placeholder="Please enter quantity" value="{{ old('quantity') }}" />
                                </div>
                                <div class="form-group">
                                    <label>Screen</label>
                                    <input class="form-control" required=""  name="screen" value="{{ old('screen') }}"
                                        placeholder="Please enter screen" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>OS</label>
                                    <input class="form-control" required=""  name="os" value="{{ old('os') }}"
                                        placeholder="Please enter OS" />
                                </div>
                                <div class="form-group">
                                    <label>Camera</label>
                                    <input class="form-control" required=""  name="camera" value="{{ old('camera') }}"
                                        placeholder="Please enter camera" />
                                </div>
                                <div class="form-group">
                                    <label>Front Camera</label>
                                    <input class="form-control" required=""  name="frontcamera" 
                                        value="{{ old('frontcamera') }}" placeholder="Please enter front camera" />
                                </div>
                                <div class="form-group">
                                    <label>CPU</label>
                                    <input class="form-control" required=""  name="cpu" value="{{ old('cpu') }}"
                                        placeholder="Please enter CPU" />
                                </div>
                                <div class="form-group">
                                    <label>RAM</label>
                                    <input class="form-control" required=""  name="ram" value="{{ old('ram') }}"
                                        placeholder="Please enter RAM" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Memory</label>
                                    <input class="form-control" required=""  name="memory" value="{{ old('memory') }}"
                                        placeholder="Please enter memory" />
                                </div>
                                <div class="form-group">
                                    <label>SIM</label>
                                    <input class="form-control" required=""  name="sim" value="{{ old('sim') }}"
                                        placeholder="Please enter SIM" />
                                </div>
                                <div class="form-group">
                                    <label>PIN</label>
                                    <input class="form-control" required=""  name="pin" value="{{ old('pin') }}"
                                        placeholder="Please enter PIN" />
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input class="form-control" type="number" min="1" required="" name="warranty"   
                                        placeholder="Please enter warranty" value="{{ old('warranty') }}" />
                                </div>
                                <div class="form-group">
                                    <label>Images</label>
                                    <input class="form-control" type="file" name="images[]" multiple required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>                    
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop