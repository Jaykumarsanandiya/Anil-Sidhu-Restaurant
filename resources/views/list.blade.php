@extends('layout')

@section('content')
    <h1 class="d-flex justify-content-center">This is List Page</h1>

    @if (Session()->has('status'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session()->get('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="container ">
        <table class="table table-striped table-hover table-responsive d-flex justify-content-center">
            <tr>

                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Address</td>
                <td>Photo</td>
                <td>Operation</td>

            </tr>
            @foreach ($data as $item)
                <tr>

                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['address'] }}</td>
                    <td>
                        <img style=" height: 200px;width: 50%;" src="{{ asset('images/' . $item['image_path']) }}">
                    </td>
                    <td> <a href="/delete/{{ $item['id'] }}"> <i class="fa-solid fa-trash-can"></i> </a>
                        <a href="/edit/{{ $item['id'] }}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                      <a href="/download/{{ $item['id'] }}"  <button type="button" class="btn btn-success">Download</button>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>
@endsection
