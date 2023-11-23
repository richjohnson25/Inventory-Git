@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Ubah Profil</h1>
        <form class="container" action="{{ route('editProfile') }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{Auth::user()->name}}">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email User</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{Auth::user()->email}}">

                @error('email')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{Auth::user()->username}}">

                @error('username')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="submit" value="Update Profile" class="loginBtn">
        </form>
    </div>
</div>
@endsection