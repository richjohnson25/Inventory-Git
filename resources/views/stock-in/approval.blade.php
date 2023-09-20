@extends('layout.template')

@section('body')
<div class="sidenav">
    <h3>MENU</h3>
    <a href="/dashboard">Dashboard</a>
    <button class="dropdown-btn">Barang
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/products">Daftar Barang</a>
    </div>
    <button class="dropdown-btn">Supplier
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/suppliers">Daftar Supplier</a>
    </div>
    <button class="dropdown-btn">Customer
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/customers">Daftar Customer</a>
    </div>
    <button class="dropdown-btn">Stok Barang Masuk
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock_in/index">Daftar Pembelian</a>
        <a href="/stock_in/chooseDate">Laporan Pembelian</a>
    </div>
    <button class="dropdown-btn">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock_out/index">Daftar Penjualan</a>
        <a href="/stock_out/chooseDate">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="main">
        <h2 class="title">APPROVAL PEMBELIAN BARANG</h2>
        <form class="container" method="POST" action="/stock_in/index/{{ $stock_in->id }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
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
                        <th>Nama: {{ $stock_in->supplier->user->name }}</th>
                        <th>Email: {{ $stock_in->supplier->user->email }}</th>
                    </tr>
                    <tr>
                        <th>Telepon: {{ $stock_in->supplier->user->phone_number }}</th>
                        <th>Keterangan: {{ $stock_in->notes }}</th>
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
            <button class="btn btn-primary" type="submit">Approve Transaksi Pembelian</button>
        </form>
    </div>
</div>
@endsection