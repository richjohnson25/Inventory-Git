@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Detail Penjualan Barang</h1>
        <div style="margin: 20px 0;">
            <h3>No. Penjualan {{ $stock_out->order_number }} - {{ $stock_out->datetime }}</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" scope="colgroup">Info Customer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama: {{ $stock_out->customer->user->name }}</th>
                    <th>Email: {{ $stock_out->customer->user->email }}</th>
                </tr>
                <tr>
                    <th>Telepon: {{ $stock_out->customer->user->phone_number }}</th>
                    <th>Keterangan: {{ $stock_out->notes }}</th>
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
                    <th>Nama Barang: {{ $stock_out->product->name }}</th>
                    <th>Kode Barang: {{ $stock_out->product->code }}</th>
                </tr>
                <tr>
                    <th>Jumlah: {{ $stock_out->quantity }} {{ $stock_out->product->unit->name }}</th>
                    <th>Harga per unit: {{ $stock_out->price }}</th>
                </tr>
                <tr>
                    <th colspan="2" scope="colgroup">Total Harga: {{ $stock_out->total_price }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection