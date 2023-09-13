@extends('./components/layout')

@section("content")
<section id="register-section">
    <h2>Register</h2>
    <form action="" method="POST">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text" maxlength="45">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" maxlength="45">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" maxlength="255">
        @if(Session::get("success"))
        <span class="success-message">{{Session::get("success")}}</span>
        @endif
        @error('name')
            <span class="error-message">{{$message}}</span>
        @enderror
        <button type="submit">Create</button>
        <a href="/login">Already have an account ?</a>
    </form>
</section>
@endsection