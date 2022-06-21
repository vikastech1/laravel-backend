@extends('dashboards.master')
@push('css')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card-header ">
                  <h4 class="card-title">Category List</h4>
                   <p class="card-category pull-right" style="float:right;"><button class="btn btn-info btn-fill addCategory"  data-toggle="modal" data-target="#addModal">Add Category</button></p>
              </div>
              <div class="card-body table-full-width table-responsive">
                <div class="response"></div>
                    <table class="table table-bordered data-table" id="category_list" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
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
<input type="hidden" name="id" id="id" />  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title " id="addModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">                            
                <label for="tittle" class="col-form-label">Title:</label>
                <input type="text" class="form-control" name="tittle" id="tittle" >
            </div> 
            <div id="addErrors"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary addCategoryBtn">Store</button>
        </div>
      </div>
    </div>
  </div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="modal-body">
          <form>
            <div class="form-group">                            
                <label for="tittle" class="col-form-label">Title:</label>
                <input type="text" class="form-control" name="name"  id="name">
            </div> 
            <div id="editErrors"></div>
          </form>
        </div>
        <div class="modal-footer">     
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>     
          <button type="button" class="btn btn-primary updateCategoryBtn">Update</button>
        </div>
      </div>
    </div>
  </div>
<!--  </ Edit Modal -->
<!-- Delete Modal -->
<div id="deleteModal" class="modal  modal-danger">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">							
				<h4 class="modal-title w-100">Are you sure?</h4>                
			</div>
			<div class="modal-body">                
				<p>Do you sure want to delete this "<strong id="category_name"></strong>" ? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;
				<button type="button" class="btn btn-danger" id="deleteCategoryBtn">Delete</button>
			</div>
		</div>
	</div>
</div> 
<!--  </ Delete Modal -->

@endsection   
@push('scripts')
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script type="text/javascript">
jQuery(function () {
  jQuery.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
});
    var table = jQuery('#category_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('category.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tittle', name: 'tittle'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on('click', '.addCategory', function(){                
        $('#addErrors').html('');           
    });
    // Add Writing Category 
    jQuery(document).on('click', '.addCategoryBtn', function(){        
      var tittle = jQuery('#tittle').val();
      jQuery('.response').html('');
      jQuery('#addErrors').html('');
      jQuery.ajax({
          type:'POST',
          url:"{{ route('category.store') }}",
          data:{tittle:tittle},
          success:function(data){ 
            
              jQuery('#tittle').val(''); 
              jQuery("#addModal").modal("hide");                  
              if(data.status == 'Success'){
                  let Table = jQuery('#category_list').dataTable(); 
                  Table.fnDraw(false);
                  jQuery('.response').html(data.message);
                  
              }else if(data.status == 'Failed'){                                                
                  let arr = data.message;
                  jQuery.each(arr, function(index, value){
                      if (value.length != 0){
                          jQuery("#addErrors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                      }
                  });
              }                    
          },
      });
    });
    // Edit Writing Category
      $(document).on('click', '.editCategory', function(){    
          $('.response').html('');    
          $('#editErrors').html('');
          var id = $(this).data('id');
          var tittle = $(this).data('name');
          $('#id').val(id); 
          $('#name').val(tittle);
          console.log(tittle);   
      });
    // update Writing Category
    $(document).on('click', '.updateCategoryBtn', function(){    
          let id = $('#id').val();
          let tittle = $('#name').val();
          $('.response').html('');
          jQuery.ajax({
            type: 'post',
            url: '{{ route('category.update')}}',
            data:{id:id,tittle:tittle},
            success:function(data){
              $('#editModal').modal('hide');
            if(data.status == 'Success'){
               
                let Table = $('#category_list').dataTable();
                Table.fnDraw(false);
                $('.response').html(data.message);
               
            }
            }
          });
      });
   
    $('#category_list').on('click', '.deleteCategory', function(){    
          var id = $(this).data('id');
          $('#id').val(id); 
          // alert(id);
    });
   $('body').on('click','#deleteCategoryBtn',function(){
        var id = $('#id').val();
        // alert(id);
        $.ajax({
          type: 'POST',
          url: "{{ route('category.destroy') }}",
          data : {id:id},
          success:function(data){
            jQuery('#deleteModal').modal('hide');
            if(data.status == 'Success'){
               var Table = jQuery('#category_list').dataTable(); 
               Table.fnDraw(false);
               
            }   
          }
        });
   });

    
     
});
</script>
@endpush
