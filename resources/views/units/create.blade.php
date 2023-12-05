@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Satuan Barang</h1>
        <form class="row g-3" action="{{ route('storeUnit') }}" method="POST">
            @csrf
            <div class="col-md-12" id="unit_name">
                <label for="name" class="form-label">Nama Satuan</label>
                <input type="text" class="form-control" id="name" name="name">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="add-unit" class="btn btn-primary" type="submit">Tambah Satuan</button>
            </div>
        </form>
    </div>
</div>
@endsection