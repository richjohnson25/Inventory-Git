@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="dashboard-main">
        <div class="summary-row">
            <div class="summary-box">
                <h6>Produk Tersedia</h6>
                <h5>{{-- $available --}}</h5>
            </div>
            <div class="summary-box">
                <h6>Transaksi barang masuk</h6>
                <h5>{{-- $stock_ins --}}</h5>
            </div>
            <div class="summary-box">
                <h6>Transaksi barang keluar</h6>
                <h5>{{-- $stock_outs --}}</h5>
            </div>
            <div class="summary-box">
                <h6>Produk Kosong</h6>
                <h5>{{-- $out_of_stock --}}</h5>
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