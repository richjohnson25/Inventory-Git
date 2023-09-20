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
        <h2 class="title">TAMBAH TRANSAKSI PENJUALAN BARANG</h2>
        <form class="container" method="POST" action="/stock_out/listIndex" oninput="total_price.value=parseInt(quantity.value)*parseInt(price.value)">
            @csrf
            <div class="grid-container form-holder">
                <div class="float-container" id="stock_out_number">
                    <label for="order_number">No. Penjualan</label>
                    <input type="text" id="order_number" name="order_number">
                </div>
                <div class="float-container" id="stock_out_date">
                    <label for="datetime">Tanggal</label>
                    <input type="date" id="datetime" name="datetime">
                </div>
                <div class="float-container" id="stock_out_customer_name">
                    <label for="customer">Customer</label>
                    <input type="text" id="customer" name="customer">
                </div>
                <div class="float-container" id="stock_out_item_name">
                    <label for="item_name">Nama Barang</label>
                    <input type="text" id="item_name" name="item_name">
                </div>
                <div class="float-container" id="stock_available">
                    <label for="stock_per_unit">Stok/Unit</label>
                    <input type="number" id="stock_per_unit" name="stock_per_unit" disabled>
                </div>
                <div class="float-container" id="stock_out_quantity">
                    <label for="quantity">Kuantitas</label>
                    <input type="number" id="quantity" name="quantity">
                </div>
                <div class="float-container" id="stock_in_price">
                    <label for="price">Harga per unit</label>
                    <input type="number" id="price" name="price" min="0" step="10000">
                </div>
                <div class="float-container" id="stock_in_total">
                    <label for="total_price">Total Harga</label>
                    <input type="number" id="total_price" name="total_price" value=output for="quantity price" disabled></input>
                </div>
            </div>
            <div class="form-holder" id="stock_in_notes">
                <label for="notes">Catatan</label><br>
                <input type="text" id="notes" name="notes">
            </div>
            <div class="form-holder">
                <button class="btn btn-primary" type="submit">Ajukan Transaksi Penjualan</button> 
            </div>
        </form>
    </div>
</div>
@endsection