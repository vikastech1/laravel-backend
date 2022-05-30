@extends('layouts.master')
@section('content')

<div class="container">
    
        <div class="card">
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
            <div class="card-body">
               <form method="POST" action="/admin/edit">
                   @csrf
                   <input type="hidden" name="id" value="{{$result['id']}}">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="text" class="form-control" id="name" value="{{$result['name']}}"placeholder="Enter Name" name="name">
                        {{ $errors->first('name') }}
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="email" class="form-control" id="email" value="{{$result['email']}}" placeholder="Enter your Email" name="email">
                        {{ $errors->first('email') }}
                    </div>
                    
                    
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                    </div>
                </form>
            </div>
           
    
</div>
@endsection