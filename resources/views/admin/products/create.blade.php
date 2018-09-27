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
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-md-7" style="padding-bottom:120px">
                        <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                          	@csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" required=""  name="name" 
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
                                    placeholder="Please enter price" />
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" required=""  name="quantity" 
                                    placeholder="Please enter quantity" />
                            </div>
                            <div class="form-group">
                                <label>Screen</label>
                                <input class="form-control" required=""  name="screen" 
                                    placeholder="Please enter screen" />
                            </div>
                            <div class="form-group">
                                <label>OS</label>
                                <input class="form-control" required=""  name="os" 
                                    placeholder="Please enter OS" />
                            </div>
                            <div class="form-group">
                                <label>Camera</label>
                                <input class="form-control" required=""  name="camera" 
                                    placeholder="Please enter camera" />
                            </div>
                            <div class="form-group">
                                <label>Front Camera</label>
                                <input class="form-control" required=""  name="frontcamera" 
                                    placeholder="Please enter front camera" />
                            </div>
                            <div class="form-group">
                                <label>CPU</label>
                                <input class="form-control" required=""  name="cpu" 
                                    placeholder="Please enter CPU" />
                            </div>
                            <div class="form-group">
                                <label>RAM</label>
                                <input class="form-control" required=""  name="ram" 
                                    placeholder="Please enter RAM" />
                            </div>
                            <div class="form-group">
                                <label>Memory</label>
                                <input class="form-control" required=""  name="memory" 
                                    placeholder="Please enter memory" />
                            </div>
                            <div class="form-group">
                                <label>SIM</label>
                                <input class="form-control" required=""  name="sim" 
                                    placeholder="Please enter SIM" />
                            </div>
                            <div class="form-group">
                                <label>PIN</label>
                                <input class="form-control" required=""  name="pin" 
                                    placeholder="Please enter PIN" />
                            </div>
                            <div class="form-group">
                                <label>Warranty</label>
                                <input class="form-control" required=""  name="warranty" 
                                    placeholder="Please enter warranty" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input class="form-control" type="file" name="images[]" multiple required="">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            <hr>

                            <div class="form-group">
                                <a style="font-size: 18px;" href="{{route('products.list')}}">Back to list</a>
                            </div> 
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop