@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Profil</h2>
        <form class="container" method="POST" action="/profile/index">
            @csrf
            @method('patch')
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Kata sandi lama</label>
                <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password">

                @error('old_password')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="new_password" class="col-sm-2 col-form-label">Kata sandi baru</label>
                <input type="text" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">

                @error('new_password')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="conf_new_password" class="col-sm-2 col-form-label">Konfirmasi kata sandi</label>
                <input type="text" class="form-control @error('conf_new_password') is-invalid @enderror" id="conf_new_password" name="conf_new_password">

                @error('conf_new_password')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="submit" value="Ubah Kata Sandi" class="loginBtn">
        </form>
    </div>
</div>
@endsection