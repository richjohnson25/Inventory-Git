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
        <a href="/stock-in-list">Daftar Pembelian</a>
        <a href="/stock-in-approval">Approval Pembelian</a>
        <a href="/stock-in-report">Laporan Pembelian</a>
    </div>
    <button class="dropdown-btn">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock-out-list">Daftar Penjualan</a>
        <a href="/stock-out-approval">Approval Penjualan</a>
        <a href="/stock-out-report">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="main">
        <h2 class="title">DAFTAR PEMBELIAN BARANG</h3>
        <form class="container" method="POST">
            <label for="stock-out_id">No. Penjualan</label>
            <input type="text" id="stock-out_id" name="stock-out_id">
            <label for="stock-out_date">Tanggal</label>
            <input type="date" id="stock-out_date" name="stock-out_date">
            <label for="customer_name">Customer</label>
            <input type="text" id="customer_name" name="customer_name">
            <label for="item_name">Nama Barang</label>
            <input type="text" id="item_name" name="item_name">
            <label for="item_name">Stock (/unit)</label>
            <input type="text" id="item_name" name="item_name">
            <button type="submit">Tambah Barang</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga/Unit</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <form method="POST">
            <input type="text" id="notes" name="notes">
            <button type="submit">Ajukan Transaksi Penjualan</button>
        </form>
    </div>
</div>
@endsection