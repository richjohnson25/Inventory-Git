@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="dashboard-main">
        <div class="summary-row">
            <h3>DASHBOARD</h3>
            <div class="summary-box">
                <h6>Produk Tersedia</h6>
                <h5>{{ $available }}</h5>
            </div>
            <div class="summary-box">
                <h6>Transaksi barang masuk</h6>
                <h5>{{ $stock_ins }}</h5>
            </div>
            <div class="summary-box">
                <h6>Transaksi barang keluar</h6>
                <h5>{{ $stock_outs }}</h5>
            </div>
            <div class="summary-box">
                <h6>Produk Kosong</h6>
                <h5>{{ $out_of_stock }}</h5>
            </div>
        </div>
        <div class="summary-table">
            <h3>Transaksi terakhir</h3>
            <h5>Transaksi stok masuk</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No. Pembelian</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Nama Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($current_stock_ins as $stock_in)
                    <tr>
                        <td>{{$stock_in->order_number}}</td>
                        <td>{{$stock_in->datetime}}</td>
                        <td>{{$stock_in->supplier->user->name}}</td>
                        <td>{{$stock_in->quantity}}</td>
                        <td>{{$stock_in->product->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>Transaksi stok keluar</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No. Penjualan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Nama Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($current_stock_outs as $stock_out)
                    <tr>
                        <td>{{$stock_out->order_number}}</td>
                        <td>{{$stock_out->datetime}}</td>
                        <td>{{$stock_out->customer->user->name}}</td>
                        <td>{{$stock_out->quantity}}</td>
                        <td>{{$stock_out->product->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection