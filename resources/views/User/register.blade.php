@extends('layouts.master')


  

@section('content')

 
<div class="container">
    
     
            
                <h3><b>Welcome Staff</b></h3>
               
                @if ($message = Session::get('success'))
                       <div class="alert alert-success alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>{{ $message }}</strong>
                       </div>
                       <br>
                @endif 
            
            <div class="card-body">
               <form method="POST" action="/admin/reg">
                   @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        {{ $errors->first('name') }}
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email">
                        {{ $errors->first('email') }}
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        {{ $errors->first('password') }}
                    </div>
                    
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" name="submit" class="btn btn-primary">Submit</button>
                         <a href="http://127.0.0.1:8000/admin/list" class="btn btn-primary ">
                        Cancel           
                        </a>
                    </div>
                </form>
            </div>
           
    


@endsection