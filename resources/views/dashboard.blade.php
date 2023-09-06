@extends('layout.template')

@section('body')
<div class="sidenav">
    <h3>MENU</h3>
    <a href="/dashboard" id="active">Dashboard</a>
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
        <a href="/stock-in-approval">Approval Pembelian</a>
        <a href="/stock-in-report">Laporan Pembelian</a>
    </div>
    <button class="dropdown-btn">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock_out/index">Daftar Penjualan</a>
        <a href="/stock-out-approval">Approval Penjualan</a>
        <a href="/stock-out-report">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="dashboard-main">
        <div class="summary-row">
            <div class="summary-box">
                <h6>Produk Tersedia</h6>
            </div>
            <div class="summary-box">
                <h6>Transaksi barang masuk</h6>
            </div>
            <div class="summary-box">
                <h6>Transaksi barang keluar</h6>
            </div>
            <div class="summary-box">
                <h6>Produk Kosong</h6>
            </div>
        </div>
        <div class="summary-chart">
            <h6>Produk dengan penjualan tertinggi</h6>
        </div>
        <div class="summary-table">
            <h6>Transaksi terakhir</h6>
        </div>
    </div>
</div>
@endsection