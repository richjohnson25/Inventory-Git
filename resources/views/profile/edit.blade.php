@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Profil</h2>
        <form class="container" method="POST" action="/profile/index">
            <label>Nama User</label><br>
            <input type="text" id="name" name="name" value="{{Auth::user()->name}}"><br>
            <label>Email User</label><br>
            <input type="text" id="email" name="email" value="{{Auth::user()->email}}"><br>
            <label>Username</label><br>
            <input type="text" id="username" name="username" value="{{Auth::user()->username}}"><br>
            <button type="submit">Perbarui Profil</button>
        </form>
    </div>
</div>
@endsection