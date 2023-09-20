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
        <h2 class="title">LAPORAN STOCK PER BARANG</h3>
        <h3>{{ $product->name }} ({{ $product->code }})</h3>
        <h5>Satuan Barang: {{ $product->unit->name }}</h5>
        <form class="search-form">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
        </form>

        <h3>STOK MASUK</h3>
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" scope="col">No.</th>
                    <th rowspan="2" scope="col">Kode Transaksi</th>
                    <th rowspan="2" scope="col">Tanggal Transaksi</th>
                    <th rowspan="2" scope="col">Saldo Awal</th>
                    <th rowspan="2" scope="col">Mutasi Barang</th>
                    <th rowspan="2" scope="col">Saldo Akhir</th>
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
                @foreach($stock_in_transactions as $stock_in)
                <tr>
                    <td>{{$stock_in->id}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->initial_quantity}}</td>
                    <td>{{$stock_in->initial_value}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->value}}</td>
                    <td>{{$stock_in->new_quantity}}</td>
                    <td>{{$stock_in->new_value}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>STOK KELUAR</h3>
        <table class="table">
        <thead>
                <tr>
                    <th rowspan="2" scope="col">No.</th>
                    <th rowspan="2" scope="col">Kode Transaksi</th>
                    <th rowspan="2" scope="col">Tanggal Transaksi</th>
                    <th rowspan="2" scope="col">Saldo Awal</th>
                    <th rowspan="2" scope="col">Mutasi Barang</th>
                    <th rowspan="2" scope="col">Saldo Akhir</th>
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
            @foreach($stock_out_transactions as $stock_out)
                <tr>
                    <td>{{$stock_out->id}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->initial_quantity}}</td>
                    <td>{{$stock_out->initial_value}}</td>
                    <td>{{$stock_out->quantity}}</td>
                    <td>{{$stock_out->value}}</td>
                    <td>{{$stock_out->new_quantity}}</td>
                    <td>{{$stock_out->new_value}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection