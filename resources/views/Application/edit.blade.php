@extends('layouts.master')
@section('content')

<div class="container">
    
            <div class="card-header">
                <h3><b>Update Staff</b></h3>
               
                @if ($message = Session::get('success'))
                       <div class="alert alert-success alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>{{ $message }}</strong>
                       </div>
                       <br>
                @endif 
            </div>
            
               <form method="POST" action="/admin/UserEdit">
                   @csrf
                   <input type="hidden" name="id" value="{{$result['id']}}">
                   
                                  <div class="form-group">
                                    <label  class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="firstName" name="name" value="{{$result['name']}}" placeholder="First Name" class="form-control" autofocus>
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="lastName"  name="email" value="{{$result['email']}}" placeholder="Enter Email Address" class="form-control" autofocus>
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label  class="col-sm-3 control-label">Phone no* </label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="phone" value="{{$result['phone']}}" placeholder="+91-01234-56789" class="form-control" name= "email">
                                        {{ $errors->first('phone') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">company name*</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="password" name="company" value="{{$result['company']}}" placeholder="Company Name" class="form-control">
                                        {{ $errors->first('company') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">website Url*</label>
                                    <div class="col-sm-9">
                                        <input type="url" id="password" name="web" value="{{$result['web']}}" placeholder="www.abc.com" class="form-control">
                                        {{ $errors->first('web') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Address*</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="birthDate" name="address" value="{{$result['address']}}" class="form-control" placeholder="Enter Address">
                                        {{ $errors->first('address') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="phoneNumber" name="city" value="{{$result['city']}}" placeholder="Enter your city" class="form-control">
                                        {{ $errors->first('city') }}
                            
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label  class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="" name="country" value="{{$result['country']}}" placeholder="Enter your Country" class="form-control">
                                        {{ $errors->first('country') }}
                            
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label  class="col-sm-3 control-label" >Category* </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="weight" name="category" value="{{$result['category']}}" placeholder="Category" class="form-control">
                                        {{ $errors->first('category') }}
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label  class="col-sm-3 control-label" >Tag* </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="weight" name="tag" value="{{$result['tag']}}" placeholder="Tags" class="form-control">
                                        {{ $errors->first('Tag') }}
                                    </div>
                                </div>
                    
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                    </div>
                </form>
          
           
    

</div>
@endsection