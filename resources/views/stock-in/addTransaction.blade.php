@extends('layout.template')

@section('body')
<div class="sidenav">
    <h3>MENU</h3>
    <a href="/dashboard">Dashboard</a>
    <button class="dropdown-btn">Barang
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/goods_list">Daftar Barang</a>
    </div>
    <button class="dropdown-btn">Supplier
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/supplier_list">Daftar Supplier</a>
    </div>
    <button class="dropdown-btn">Customer
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/customer_list">Daftar Customer</a>
    </div>
    <button class="dropdown-btn">Stok Barang Masuk
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#stock-in-list">Daftar Pembelian</a>
        <a href="#stock-in-approval">Approval Pembelian</a>
        <a href="#stock-in-report">Laporan Pembelian</a>
    </div>
    <button class="dropdown-btn">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#stock-out-list">Daftar Penjualan</a>
        <a href="#stock-out-approval">Approval Penjualan</a>
        <a href="#stock-out-report">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="main">
        <h2 class="title">TAMBAH TRANSAKSI PEMBELIAN BARANG</h3>
        <form class="container" method="POST">
            <label for="stock-in_id">No. Pembelian</label>
            <input type="text" id="stock-in_id" name="stock-in_id">
            <label for="stock-in_date">Tanggal</label>
            <input type="date" id="stock-in_date" name="stock-in_date">
            <label for="supplier_name">Supplier</label>
            <input type="text" id="supplier_name" name="supplier_name">
            <label for="item_name">Nama Barang</label>
            <input type="text" id="item_name" name="item_name">
            <button type="submit">Tambah Barang</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga/Unit</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Total Harga/Barang</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <form method="POST">
            <button type="submit">Ajukan Transaksi Pembelian</button>
        </form>
    </div>
</div>
@endsection