@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Customer</h1>
        <form class="row g-3" action="{{ route('storeCustomer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12" id="customer_code">
                <label for="customer_code" class="form-label">Kode</label>
                <input type="text" class="form-control" id="customer_code" name="code">

                @error('code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_name">
                <label for="customer_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="customer_name" name="name">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_phone_number">
                <label for="customer_phone_number" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="customer_phone_number" name="phone_number">

                @error('phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_address">
                <label for="customer_address" class="form-label">Kode Supplier</label>
                <input type="text" class="form-control" id="customer_address" name="address">

                @error('address')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="add-customer" class="btn btn-primary" type="submit">Tambah Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection