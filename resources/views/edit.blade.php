@extends('layout')

@section('content')
<h1>This is Edit Restaurant Page</h1>    
<div class="container">
    <form method="POST" action="/editRecord/{{$editR['id']}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name Of Restaurant</label>
            <input type="text" class="form-control"  name="name" value="{{$editR['name']}}" id="exampleInputName" aria-describedby="emailHelp" placeholder="">
               </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" value="{{$editR['email']}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
           </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Address</label>
            <input type="text"  class="form-control" name="address" value="{{$editR['address']}}" id="exampleFormControlTextarea1" rows="3">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection