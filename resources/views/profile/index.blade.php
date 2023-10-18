@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Profil</h1>
        <div class="profile-container">
            <h6>Nama: {{Auth::user()->name}}</h6>
            <h6>Email: {{Auth::user()->email}}</h6>
            <h6>Username: {{Auth::user()->username}}</h6>
            <div class="editPanel">
                <a href="/profile/edit">Ubah Profil</a>
                <a href="/profile/changePassword">Ubah Kata Sandi</a>
            </div>
        </div>
    </div>
</div>
@endsection