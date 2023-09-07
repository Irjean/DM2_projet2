<?php

?>

@extends('./components/layout')

@section("content")
<section id="login-section">
    @isset($id)
        {{dd("sauce")}}
    @endisset
    <h2>Login</h2>
    <form action="" method="POST">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text">
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
        <button type="submit">Log In</button>
        @error('name')
            {{$message}}
        @enderror
    </form>
</section>
@endsection