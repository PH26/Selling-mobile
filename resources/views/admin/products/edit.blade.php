@extends('admin.layouts.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
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
                    <div class="col-lg-12" style="padding-bottom:50px">
                        <form action="{{ route('products.update',$product)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required="" name="name" value="{{ $product->name }}"  placeholder="Please enter product name" />
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                     <div class="form-controls">
                                        <select name='category_id' class="form-control">
                                                    @foreach($categories as $category)
                                                        <option
                                                        @if($product->category->id == $category->id)
                                                            {{"selected"}}
                                                        @endif
                                                        value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" required="" name="price" value="{{ $product->price }}"  placeholder="Please enter price" />
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" type="number" min="1" required="" name="quantity" value="{{ $product->quantity }}"  placeholder="Please enter quantity" />
                                </div>
                                <div class="form-group">
                                    <label>Screen</label>
                                    <input class="form-control" required="" name="screen" value="{{ $product->screen }}"  placeholder="Please enter screen" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>OS</label>
                                    <input class="form-control" required="" name="os" value="{{ $product->os }}"  placeholder="Please enter os" />
                                </div>
                                <div class="form-group">
                                    <label>Camera</label>
                                    <input class="form-control" required="" name="camera" value="{{ $product->camera }}"  placeholder="Please enter camera" />
                                </div>
                                <div class="form-group">
                                    <label>Front Camera</label>
                                    <input class="form-control" required="" name="frontcamera" value="{{ $product->frontcamera }}"  placeholder="Please enter front camera" />
                                </div>
                                <div class="form-group">
                                    <label>CPU</label>
                                    <input class="form-control" required="" name="cpu" value="{{ $product->cpu }}"  placeholder="Please enter CPU" />
                                </div>
                                <div class="form-group">
                                    <label>RAM</label>
                                    <input class="form-control" required="" name="ram" value="{{ $product->ram }}"  placeholder="Please enter RAM" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Memory</label>
                                    <input class="form-control" required="" name="memory" value="{{ $product->memory }}"  placeholder="Please enter memory" />
                                </div>
                                <div class="form-group">
                                    <label>SIM</label>
                                    <input class="form-control" required="" name="sim" value="{{ $product->sim }}"  placeholder="Please enter SIM" />
                                </div>
                                <div class="form-group">
                                    <label>PIN</label>
                                    <input class="form-control" required="" name="pin" value="{{ $product->pin }}"  placeholder="Please enter PIN" />
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input class="form-control" type="number" min="1" required="" name="warranty" value="{{ $product->warranty }}"  placeholder="Please enter warranty" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Edit</button>
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