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
        <h2 class="title">LAPORAN STOCK PER BARANG</h3>
        <h3>Nama Barang</h3>
        <h5>Satuan Barang:</h5>
        <form class="search-form">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th rowspan="3" scope="col">No.</th>
                    <th rowspan="3" scope="col">Kode Transaksi</th>
                    <th rowspan="3" scope="col">Tanggal Transaksi</th>
                    <th rowspan="2" colspan="2" scope="colgroup">Saldo Awal</th>
                    <th colspan="6" scope="colgroup">Mutasi Barang</th>
                    <th rowspan="2" colspan="2" scope="colgroup">Saldo Akhir</th>
                </tr>
                <tr>
                    <th colspan="2" scope="colgroup">Barang Masuk</th>
                    <th colspan="2" scope="colgroup">Barang Keluar</th>
                    <th colspan="2" scope="colgroup">Lain-lain</th>
                </tr>
                <tr>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection