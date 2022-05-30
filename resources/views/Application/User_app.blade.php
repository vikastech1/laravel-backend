@extends('layouts.user')
@section('content')

    <div class="container px-4 px-lg-5 mt-5">
    	 
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                	 @if ($message = Session::get('success'))
                       <div class="alert alert-success alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>{{ $message }}</strong>
                       </div>
                       <br>
        		    @endif

                    <div class="container">
                    	<h2><b>Application form for users</b></h2>
				            <form class="form-horizontal" role="form" action="/addUser" method="post">
				                @csrf
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">Name</label>
				                    <div class="col-sm-9">
				                        <input type="text" id="firstName" name="name" placeholder="First Name" class="form-control" autofocus>
				                        {{ $errors->first('name') }}
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">Email</label>
				                    <div class="col-sm-9">
				                        <input type="email" id="lastName"  name="email" placeholder="Enter Email Address" class="form-control" autofocus>
				                        {{ $errors->first('email') }}
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">Phone no* </label>
				                    <div class="col-sm-9">
				                        <input type="text" id="email"  name="phone" placeholder="+91-01234-56789" class="form-control" name= "email">
				                        {{ $errors->first('phone') }}
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">company name*</label>
				                    <div class="col-sm-9">
				                        <input type="text" id="password" name="company" placeholder="Company Name" class="form-control">
				                        {{ $errors->first('company') }}
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">website Url*</label>
				                    <div class="col-sm-9">
				                        <input type="url" id="password" name="web" placeholder="www.abc.com" class="form-control">
				                        {{ $errors->first('web') }}
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">Address*</label>
				                    <div class="col-sm-9">
				                        <input type="text" id="birthDate" name="address" class="form-control" placeholder="Enter Address">
				                        {{ $errors->first('address') }}
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label  class="col-sm-3 control-label">City</label>
				                    <div class="col-sm-9">
				                        <input type="text" id="phoneNumber" name="city" placeholder="Enter your city" class="form-control">
				                        {{ $errors->first('city') }}
				            
				                    </div>
				                </div>
				                 <div class="form-group">
				                    <label  class="col-sm-3 control-label">Country</label>
				                    <div class="col-sm-9">
				                        <input type="text" id="" name="country" placeholder="Enter your Country" class="form-control">
				                        {{ $errors->first('country') }}
				            
				                    </div>
				                </div>
				                 <div class="form-group">
				                        <label  class="col-sm-3 control-label" >Category* </label>
				                    <div class="col-sm-9">
				                        <input type="text" id="weight" name="category" placeholder="Category" class="form-control">
				                        {{ $errors->first('category') }}
				                    </div>
				                </div>
				                 <div class="form-group">
				                        <label  class="col-sm-3 control-label" >Tag* </label>
				                    <div class="col-sm-9">
				                        <input type="text" id="weight" name="tag" placeholder="Tags" class="form-control">
				                        {{ $errors->first('Tag') }}
				                    </div>
				                </div>
				                
				               <div class="d-flex " style="float: right;">
				               	<div><button type="submit" name="submit" style = "width:100px;text-align: center;" class="btn btn-primary btn-block">Submit</button></div>&nbsp &nbsp
				               	<div><a href="http://127.0.0.1:8000/home"  style = "width:100px;" class="btn btn-primary btn-block">Cancel</a></div>
				               		 
				                	 
				               </div>
				                	
				               
				            </form> <!-- /form -->
				        </div> <!-- ./container -->
                </div>
            </div>

@endsection