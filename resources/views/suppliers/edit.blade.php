@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Edit Supplier</h1>
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

        <form class="row g-3" action="{{ route('updateSupplier', $supplier->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12" id="supplier_code">
                <label for="supplier_code" class="form-label">Kode Supplier</label>
                <input type="text" class="form-control" id="supplier_code" name="code" value="{{ old('code', $supplier->code) }}">

                @error('code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_name">
                <label for="supplier_name" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="supplier_name" name="name" value="{{ old('name', $supplier->name) }}">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_phone_number">
                <label for="supplier_phone_number" class="form-label">No. Telepon Supplier</label>
                <input type="text" class="form-control" id="supplier_phone_number" name="phone_number" value="{{ old('phone_number', $supplier->phone_number) }}">

                @error('phone_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_address">
                <label for="supplier_address" class="form-label">Alamat Supplier</label>
                <input type="text" class="form-control" id="supplier_address" name="address" value="{{ old('address', $supplier->address) }}">

                @error('address')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="update-supplier" class="btn btn-primary" type="submit">Perbarui Supplier</button>
            </div>
        </form>
    </div>
</div>
@endsection