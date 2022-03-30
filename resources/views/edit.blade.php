@extends('layout')

@section('content')
    <h1>This is Edit Restaurant Page</h1>
    <div class="container">
        <form method="POST" action="/editRecord/{{ $editR['id'] }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputName">Name Of Restaurant</label>
                <input type="text" class="form-control" name="name" value="{{ $editR['name'] }}" id="exampleInputName"
                    aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ $editR['email'] }}" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $editR['address'] }}"
                    id="exampleFormControlTextarea1" rows="3">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Image Of Restaurant</label>

                {{-- {{dd(asset('images/'.$editR['image_path']))}} --}}
                <input type="file" class="form-control" name="image" id="exampleInputName"
                    value="{{ asset('images/' . $editR['image_path']) }}" aria-describedby="emailHelp" placeholder="">
            </div>
           <div><img style=" height: 200px;width: 25%;" src="{{ asset('images/' . $editR['image_path']) }}">
             </div> 

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
