@extends('admin.layouts.master')
@section('content')            
<div class="container">
   <div class="panel panel-default">
        <div class="panel-heading">List Categories</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search categories..." />
            </div>
            <div>
                @if (session('success'))
                    <div class="alert" style="background:#dff0d8; color:#4f844f" role="alert">
                        {{ session('success') }}
                    </div>
                @endif     
            </div>
            <div class="table-responsive">
                <h3 align="center">Total: <span id="total_records"></span></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                   <tbody>
                                           
                    </tbody>      
                </table>
                {{ $categories->links() }}
            </div>
        </div>    
   </div>
</div>          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    fetch_category_data();
    function fetch_category_data(query = ''){
        $.ajax({
            url:"{{ route('categories.search') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data){
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }
    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_category_data(query);
     });
});
</script>
@stop
