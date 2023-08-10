@extends('layout.template')

@section('body')
<div class="loginPanel">
    <h1>Login</h1>
    <form method="POST" action="">
        {{ csrf_field() }}
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Kata Sandi"><br>
        <a href="/item">Forget password?</a><br>
        <input type="submit" value="Login" class="loginBtn"><br>
        <h6>Belum daftar?</h6><br>
        <a href="/register">Register</a><br>
        <a href="/home">Kembali ke menu utama</a>
    </form>
</div>
@endsection