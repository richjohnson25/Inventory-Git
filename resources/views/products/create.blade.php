@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Barang</h1>
        <form class="row g-3" action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12" id="product_code">
                <label for="code" class="form-label">Kode Produk</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code">

                @error('code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="product_name">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="product_category">
                <label for="product_category" class="form-label">Kategori</label>
                <select id="product_category" name="category_id" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>

                @error('product_category')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="product_unit">
                <label for="product_unit" class="form-label">Satuan</label>
                <select id="product_unit" name="unit_id" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{$unit->name}}</option>
                    @endforeach
                </select>

                @error('product_unit')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="add-product" class="btn btn-primary" type="submit">Tambah Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection