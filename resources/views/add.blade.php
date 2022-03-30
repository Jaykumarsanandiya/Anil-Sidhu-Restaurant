@extends('layout')

@section('content')
    <h1>This is Add Restaurant Page</h1>
    <div class="container">
        <form method="POST" action="/addRecord" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputName">Name Of Restaurant</label>
                <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="emailHelp"
                    placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <input type="text" class="form-control" name="address" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputName">Image Of Restaurant</label>
                <input type="file" class="form-control" name="image" id="exampleInputName" aria-describedby="emailHelp"
                    placeholder="">
            </div>

           

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
