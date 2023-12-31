@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Detail Pembelian Barang</h1>
        <div style="margin: 20px 0;">
            <h3>No. Pembelian {{ $stock_in->order_number }} - {{ $stock_in->datetime }}</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" scope="colgroup">Info Supplier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama: {{ $stock_in->supplier->name }}</th>
                    <th>Telepon: {{ $stock_in->supplier->phone_number }}</th>
                </tr>
                <tr>
                    <th colspan="2" scope="colgroup">Keterangan: {{ $stock_in->notes }}</th>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" scope="colgroup">Info Barang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama Barang: {{ $stock_in->product->name }}</th>
                    <th>Kode Barang: {{ $stock_in->product->code }}</th>
                </tr>
                <tr>
                    <th>Jumlah: {{ $stock_in->quantity }} {{ $stock_in->product->unit->name }}</th>
                    <th>Harga per unit: {{ $stock_in->price }}</th>
                </tr>
                <tr>
                    <th colspan="2" scope="colgroup">Total Harga: {{ $stock_in->total_price }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection