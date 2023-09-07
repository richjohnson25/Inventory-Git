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
        <h2 class="title">LAPORAN PENJUALAN BARANG</h2>
        <h4>Outlet X</h4>
        <h6></h6>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Pembelian</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_out_transactions as $stock_outs)
                <tr>
                    <td>{{$stock_outs->id}}</td>
                    <td>{{$stock_outs->order_number}}</td>
                    <td>{{$stock_outs->datetime}}</td>
                    <td>{{$stock_outs->customer->user->name}}</td>
                    <td>{{$stock_outs->goods->item_name}}</td>
                    <td>{{$stock_outs->quantity}}</td>
                    <td>{{$stock_outs->notes}}</td>
                    <td>{{$stock_outs->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="print-section">
            <button>Cetak</button>
            <button>Export ke .PDF</button>
            <button>Export ke .XLSX</button>
        </div>
    </div>
</div>
@endsection