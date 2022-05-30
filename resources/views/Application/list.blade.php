@extends('layouts.master')

@section('content')
<div class="container" align="center" >

	<div class="row">
		 <div class="input-group" style="margin-top: 50px; margin-bottom: 40px;">
			<form action="/admin/search-record" method="post">
				@csrf
			 <input type="text" id="" name="name" class="form-control" style="width:300px;">
			 <input type="submit" name="submit" value="search"/>
			  
			</form>

		</div>

		<table  class="table-striped table-bordered table-active" style="width: 100%; text-align: center;" >
			<tr style="background-color:#e0c26e; height: 40px;">
				<th style="text-align: center;">Id</th>
				<th style="text-align: center;">Name</th>
				<th style="text-align: center;">Email</th>
				<th style="text-align: center;">Phone</th>
				<th style="text-align: center;">Company</th>
				<th style="text-align: center;">Web</th>
				<th style="text-align: center;">Address</th>
				<th style="text-align: center;">City</th>
				<th style="text-align: center;">Country</th>
				<th style="text-align: center;">Category</th>
				<th style="text-align: center;">Tag</th>
				<th style="text-align: center;width:100px;">Action</th>
				
			</tr>
             
			@foreach($data as $row)
			

               <tr>
				<td>{{ $row['id'] }}</td>
				<td>{{$row['name']}}</td>
				<td>{{$row['email']}}</td>
				<td>{{ $row['phone'] }}</td>
				<td>{{$row['company']}}</td>
				<td>{{$row['web']}}</td>
				
				<td>{{$row['address']}}</td>
				<td>{{$row['city']}}</td>
				<td>{{ $row['country'] }}</td>
				<td>{{$row['category']}}</td>
				<td>{{$row['tag']}}</td>
				
				<td ><a href="{{"UserEdit/".$row['id']}}" class="btn btn-primary a-btn-slide-text">
			        <i class="fa fa-edit"></i>
			        </a>
				    
				    <a href="{{"UserDelete/".$row['id']}}" class="btn btn-primary a-btn-slide-text" style="background-color:red;">
				       <i class="fa fa-trash" ></i>          
				    </a>
				</td>
			</tr>
				  
		  
			@endforeach

		</table>
			{!! $data->links() !!}
	</div>
	
</div>
@endsection()
