@extends('layouts.master')

@section('content')
<div class="container" align="center" >
	<div class="row">
		<div>
			<a href="http://127.0.0.1:8000/admin/reg" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span><strong>Create Staffs</strong></span>            
    	</a>
		</div>
		
    	
        

		<table  class="table-striped table-bordered" style="width: 100%; text-align: center;" >
			<tr>
				<th style="text-align: center;">Id</th>
				<th style="text-align: center;">Name</th>
				<th style="text-align: center;">Email</th>
				<th style="text-align: center;">Status</th>
				<th style="text-align: center;">Action</th>
				
			</tr>
             
			@foreach($record as $row)
			 @if($row['is_admin'] == '0')

               <tr>
				<td>{{ $row['id'] }}</td>
				<td>{{$row['name']}}</td>
				<td>{{$row['email']}}</td>
				<td>
					@if($row['status'] == '0')

                       <a href="{{url('/admin/status-update',$row['id']) }}" style="width: 100px;" class="btn btn-success"> Active</a>
				    
                    @else
                       <a href="{{url('/admin/status-update',$row['id']) }}" style="width: 100px;" class="btn btn-danger"> Inactive</a>
                    @endif
				</td>
				<td ><a href="{{"edit/".$row['id']}}" class="btn btn-primary a-btn-slide-text">
			        <i class="fa fa-edit"></i>
			        </a>
				    
				    <a href="{{"delete/".$row['id']}}" class="btn btn-primary a-btn-slide-text" style="background-color:red;">
				       <i class="fa fa-trash" ></i>          
				    </a>
				</td>
			</tr>
				   @endif
		  
			@endforeach

		</table>
			{!! $record->links() !!}
	</div>
	
</div>
@endsection()
