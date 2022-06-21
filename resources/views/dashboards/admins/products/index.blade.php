@extends('dashboards.master')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
div#product-list_filter {float: right;}
div#product-list_paginate {  float: right;}
</style>
@endpush
@section('content') 
<!-- product list show on frontend -->
<div class="content">
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card-header ">
                  <h4 class="card-title">Products List</h4>
                  <!-- Trigger the modal with a button -->
                 
                  <p class="card-product pull-right" style="float:right;"><button type="button" class="btn btn-info btn-lg addProductsbtn" data-toggle="modal" data-target="#myModal">Add Products</button> </p>
              </div>
              <div class="card-body table-full-width table-responsive">
                <div class="response"></div>
                    <table class="table table-bordered data-table" id="product-list" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th width="300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
  </div>
</div>  
<input type="hidden" id="id" name="id">
<!-- Create Product Modal -->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body" >
        <form>
            <div class="form-group">                            
                <label for="title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Tittle">
            </div> 
            <div class="form-group">                            
                <label for="sku" class="col-form-label">SKU:</label>
                <input type="text" class="form-control" name="sku" id="sku" placeholder="Enter sku code" >
            </div> 
            <div class="form-group">                            
                <label for="price" class="col-form-label">Price:</label>
                <input type="tel" class="form-control" name="price" id="price" placeholder="Enter price">
            </div> 
            <div class="form-group">                            
                <label for="quantity" class="col-form-label">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantity" >
            </div> 
            <div class="form-group">                            
                <label for="description" class="col-form-label">Description:</label>
                <input type="textarea" class="form-control" name="description" id="description" placeholder="Enter sku code">
            </div> 
            <div class="form-group">                            
                <label for="category_id" class="col-form-label">Category:</label>                
                <select name="category_id" id="category_id" class="form-control">                  
                  @if(count($categories) > 0)
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->tittle}}</option>
                    @endforeach
                  @endif
                </select>
            </div> 
            <div id="addErrors"></div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary addProducts">Store</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script>
  $( document ).ready(function() {
    var table = $('#product-list').DataTable({
      processing : true,
      serverSide : true,
      ajax: "{{route('products.index')}}",
      columns: [
            {data: 'id',name: 'id'},
            {data:'title',name:'title'},
            {data:'sku',name:'sku'},
            {data:'price',name:'price'},
            {data:'quantity',name:'quantity'},
            {data:'description',name:'description'},
            {data:'category.tittle',name:'category.tittle'},
            {data:'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    //store products data
    $(document).on('click', '.addProductsbtn', function(){                
        $('#addErrors').html('');           
    });

    $('.addProducts').on('click',function(){
        var title = $('#title').val();
        var sku = $('#sku').val();
        var price = $('#price').val();
        var quantity = $('#quantity').val();
        var description = $('#description').val();
        var category_id = $('#category_id').val();
        $.ajax({
          type:'POST',
          url:"{{route('products.store')}}",
          data:{"_token": "{{ csrf_token() }}",title:title,sku:sku,price:price,quantity:quantity,description:description,category_id:category_id},
          success:function(data){
            if(data.status=="success"){
              let Table = jQuery('#product-list').dataTable(); 
                  Table.fnDraw(false);
                  jQuery('.response').html(data.message);
                  $('#myModal').modal('hide');
            }else if(data.status == 'Failed'){                                                
                  let arr = data.message;
                  jQuery.each(arr, function(index, value){
                      if (value.length != 0){
                          jQuery("#addErrors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                      }
                  });
              }
          } 
        });
    });
  });
</script>
@endpush