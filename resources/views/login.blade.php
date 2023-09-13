@extends('./components/layout')

@section("content")
<section id="login-section">
    <h2>Login</h2>
    <form action="" method="POST">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text" maxlength="45">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" maxlength="255">
        @error('name')
            <span class="error-message">{{$message}}</span>
        @enderror
        <button type="submit">Log In</button>
        <a href="/register">Create an account</a>
    </form>
</section>
@endsection