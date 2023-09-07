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
        <div style="margin: 20px 0;">
            <h6>No. Penjualan {{ $stock_in_transactions->id }}</h6>
        </div>
        <form class="container" method="POST" action="/stock-out/listIndex">
            @csrf
            <div>
                <label for="order_number">No. Penjualan</label>
                <input type="text" id="order_number" name="order_number">
                <label for="datetime">Tanggal</label>
                <input type="date" id="datetime" name="datetime">
                <label for="customer">Customer</label>
                <input type="text" id="customer" name="customer">
                <label for="item_name">Nama Barang</label>
                <input type="text" id="item_name" name="item_name">
                <label for="stock_per_unit">Kuantitas</label>
                <input type="number" id="stock_per_unit" name="stock_per_unit" disabled>
                <label for="quantity">Kuantitas</label>
                <input type="number" id="quantity" name="quantity">
                <label for="price">Harga per unit</label>
                <input type="number" id="price" name="price" min="0" step="10000">
                <label for="notes">Catatan</label>
                <input type="text" id="notes" name="notes">
                <label for="total_price">Total Harga</label>
                <input type="number" id="total_price" name="total_price" disabled>
                <button type="submit">Ajukan Transaksi Pembelian</button>
                <button action="/stock_in/index">Kembali</button>
            </div>
        </form>
    </div>
</div>
@endsection