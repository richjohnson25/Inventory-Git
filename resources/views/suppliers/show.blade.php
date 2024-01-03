@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tinjauan Supplier</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Supplier:</strong>
                    {{ $supplier->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Supplier:</strong>
                    {{ $supplier->code }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Telepon Supplier:</strong>
                    {{ $supplier->phone_number }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat Supplier:</strong>
                    {{ $supplier->address }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection