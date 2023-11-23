@extends('layout.template')

@section('body')
<div class="register-bg">
    <div class="loginPanel">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Kata Sandi">
            </div>
            <input type="submit" value="Login" class="loginBtn">
        </form>
    </div>
</div>

@endsection