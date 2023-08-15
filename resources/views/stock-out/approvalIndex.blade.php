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
    <button class="dropdown-btn" id="active">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock-out-list">Daftar Penjualan</a>
        <a href="/stock-out-approval" id="sub_menu">Approval Penjualan</a>
        <a href="/stock-out-report">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="main">
        <h2 class="title">DAFTAR PEMBELIAN BARANG</h3>
        <form class="search-form">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Penjualan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection