@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Supplier</h1>
        <form class="row g-3" action="{{ route('storeSupplier') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12" id="supplier_code">
                <label for="supplier_code" class="form-label">Kode</label>
                <input type="text" class="form-control" id="supplier_code" name="code">

                @error('code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_name">
                <label for="supplier_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="supplier_name" name="name">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_phone_number">
                <label for="supplier_phone_number" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="supplier_phone_number" name="phone_number">

                @error('phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_address">
                <label for="supplier_address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="supplier_address" name="address">

                @error('address')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="add-supplier" class="btn btn-primary" type="submit">Tambah Supplier</button>
            </div>
        </form>
    </div>
</div>
@endsection