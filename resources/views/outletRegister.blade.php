@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="outletRegisterPanel">
        <h2>Tambah Outlet</h2>
        <form action="{{route('registerOutlet')}}" method="POST" id="outlet-register-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="user_name" class="col-sm-2 col-form-label">Nama User</label>
                <select id="item_name" name="item_name" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach($users as $user)
                        <option value="{{ $product->id }}">{{$user->name}}</option>
                    @endforeach
                </select>

                @error('outlet_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="outlet_name" class="col-sm-2 col-form-label">Nama Outlet</label>
                <input type="text" class="form-control @error('outlet_name') is-invalid @enderror" name="outlet_name" id="outlet_name">

                @error('outlet_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="outlet_phone_number" class="col-sm-2 col-form-label">No. Telepon Outlet</label>
                <input type="text" class="form-control @error('outlet_phone_number') is-invalid @enderror" name="outlet_phone_number" id="outlet_phone_number">

                @error('outlet_phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="outlet_address" class="col-sm-2 col-form-label">Alamat Outlet</label>
                <input type="text" class="form-control @error('outlet_address') is-invalid @enderror" name="outlet_address" id="outlet_address">

                @error('outlet_address')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 row">
                <input type="submit" value="Register Outlet" class="loginBtn">
            </div>
        </form>
    </div>
</div>
@endsection