@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Customer</h1>
        <form class="row g-3" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12" id="customer_code">
                <label for="customer_code" class="form-label">Kode</label>
                <input type="text" class="form-control" id="customer_code" name="customer_code">

                @error('customer_code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_name">
                <label for="customer_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name">

                @error('customer_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_phone_number">
                <label for="customer_phone_number" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="customer_phone_number" name="customer_phone_number">

                @error('customer_phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_address">
                <label for="customer_address" class="form-label">Kode Supplier</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address">

                @error('customer_address')
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