@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Laporan Penjualan Barang</h2>
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
                @foreach($approved_stock_outs as $stock_outs)
                <tr>
                    <td>{{$stock_outs->id}}</td>
                    <td>{{$stock_outs->order_number}}</td>
                    <td>{{$stock_outs->datetime}}</td>
                    <td>{{$stock_outs->customer->user->name}}</td>
                    <td>{{$stock_outs->product->name}}</td>
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