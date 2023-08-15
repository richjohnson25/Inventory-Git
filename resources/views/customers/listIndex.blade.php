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
    <button class="dropdown-btn" id="active">Customer
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/customer_list" id="sub_menu">Daftar Customer</a>
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
        <h2 class="title">DAFTAR CUSTOMER</h3>
        <form class="search-form">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection