@extends('layout.template')

@section('body')
<div class="main-bg">
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
            <div class="mb-3 row">
                <a href="/item">Forget password?</a><br>
                <input type="submit" value="Login" class="loginBtn">
            </div>
        </form>
    </div>
</div>

@endsection