@extends('layout.template')

@section('body')
<div class="registerPanel">
    <h1>Buat Akun</h1>
    <p>Silahkan isi form registrasi di bawah untuk membuka akun pemilik sebagai supplier atau customer</p>
    <form method="POST" action="">
        {{ csrf_field() }}
        <input type="text" name="name" id="name" placeholder="Nama"><br>
        <input type="text" name="phone_number" id="phone_number" placeholder="Nomor telepon"><br>
        <label for="role">Posisi:</label>
        <input type="radio" id="user" name="role" value="user">
        <label for="user">User</label>
        <input type="radio" id="admin" name="role" value="admin">
        <label for="admin">Admin</label><br>
        <input type="text" name="ktp" id="ktp" placeholder="KTP"><br>
        <input type="text" name="npwp" id="npwp" placeholder="NPWP"><br>
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Kata sandi"><br>
        <input type="password" name="confpass" id="confpass" placeholder="Ulang kata sandi"><br>
        <input type="submit" value="Lanjut" class="loginBtn">
    </form>
</div>
@endsection