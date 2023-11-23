@extends('layout.template')

@section('body')
<div class="register-bg">
    <div class="registerPanel">
        <h1>Buat Akun</h1>
        <p>Silahkan isi form registrasi di bawah untuk membuka akun pemilik sebagai supplier atau customer</p>
        <form action="{{ route('register') }}" method="POST" id="register-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username">

                @error('username')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="phone_number" class="col-sm-2 col-form-label">No. Telepon</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" placeholder="Nomor telepon">

                @error('phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Posisi:</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="user" name="role" value="user">
                        <label class="form-check-label" for="user">User</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="admin" name="role" value="admin">
                        <label class="form-check-label" for="admin">Admin</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Alamat">

                @error('address')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="ktp" class="col-sm-2 col-form-label">KTP</label>
                <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" id="ktp" placeholder="KTP">

                @error('ktp')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
                <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" id="npwp" placeholder="NPWP">

                @error('npwp')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required>

                @error('email')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Kata sandi" required>

                @error('password')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="confpass" class="col-sm-2 col-form-label">Confirm Password</label>
                <input type="password" class="form-control @error('confpass') is-invalid @enderror" name="confpass" id="confpass" placeholder="Ulang kata sandi" required>

                @error('confpass')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="submit" id="registerBtn" class="loginBtn" value="Register">
        </form>
    </div>
</div>

@endsection