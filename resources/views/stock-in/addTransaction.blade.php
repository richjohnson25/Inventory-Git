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
        <h2 class="title">TAMBAH TRANSAKSI PEMBELIAN BARANG</h2>
        <form class="container" method="POST" action="/stock-in/listIndex">
            @csrf
            <div>
                <label for="order_number">No. Pembelian</label>
                <input type="text" id="order_number" name="order_number">
                <label for="datetime">Tanggal</label>
                <input type="date" id="datetime" name="datetime">
                <label for="supplier">Supplier</label>
                <input type="text" id="supplier" name="supplier">
                <label for="item_name">Nama Barang</label>
                <input type="text" id="item_name" name="item_name">
                <label for="quantity">Kuantitas</label>
                <input type="number" id="quantity" name="quantity">
                <label for="price">Harga per unit</label>
                <input type="number" id="price" name="price" min="0" step="10000">
                <label for="notes">Catatan</label>
                <input type="text" id="notes" name="notes">
                <label for="total_price">Total Harga</label>
                <input type="number" id="total_price" name="total_price" value="{{}}" disabled>
                <button type="submit">Ajukan Transaksi Pembelian</button>
                <button action="/stock_in/index">Kembali</button>
            </div>
        </form>
    </div>
</div>
@endsection