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
    <button class="dropdown-btn" id="active">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock_out/index" id="sub_menu">Daftar Penjualan</a>
        <a href="/stock_out/chooseDate">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="main">
        <h2 class="title">DAFTAR PENJUALAN BARANG</h2>
        <button>Tambah Transaksi Penjualan</button>
        <h6>Menampilkan x barang</h6>
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
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Status</th>
                    <th colspan="2" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_out_transactions as $stock_out)
                <tr>
                    <td>{{$stock_out->id}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->customer->user->name}}</td>
                    <td>{{$stock_out->quantity}}</td>
                    <td>{{$stock_out->product->name}}</td>
                    <td>{{$stock_out->status}}</td>
                    <td><a href="/stock_out/approval/{{ $stock_out->id }}" class="btn btn-primary">Approve</a></td>
                    <form action="/stock_out/{{ $stock_out->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <td><button type="submit" class="btn btn-danger">Reject</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection