@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Profil</h2>
        <form class="container" method="POST" action="/profile/index">
            <label>Kata sandi lama</label><br>
            <input type="password" id="old_password" name="old_password"><br>
            <label>Kata sandi baru</label><br>
            <input type="text" id="new_password" name="new_password"><br>
            <label>Konfirmasi kata sandi</label><br>
            <input type="text" id="conf_new_password" name="conf_new_password"><br>
            <button type="submit">Ubah kata sandi</button>
        </form>
    </div>
</div>
@endsection