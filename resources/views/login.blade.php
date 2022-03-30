@extends('layout')


@section('content')

<div class="container">
    <h1>Login Page</h1>
    <form action="/session/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="enter username"><br><br>
        <input type="password" name="password" placeholder="enter password"><br><br>
        <button type="submit">Login</button>
    </form>
    
</div>


  @endsection