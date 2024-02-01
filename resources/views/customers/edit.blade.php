@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Edit Customer</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row g-3" action="{{ route('updateCustomer', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12" id="customer_code">
                <label for="customer_code" class="form-label">Kode Customer</label>
                <input type="text" class="form-control" id="customer_code" name="code" value="{{ old('code', $customer->code) }}">

                @error('code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_name">
                <label for="customer_name" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="customer_name" name="name" value="{{ old('name', $customer->name) }}">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_phone_number">
                <label for="customer_phone_number" class="form-label">No. Telepon Customer</label>
                <input type="text" class="form-control" id="customer_phone_number" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}">

                @error('phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="customer_address">
                <label for="customer_address" class="form-label">Alamat Customer</label>
                <input type="text" class="form-control" id="customer_address" name="address" value="{{ old('address', $customer->address) }}">

                @error('address')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="update-customer" class="btn btn-primary" type="submit">Perbarui Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection