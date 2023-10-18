@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Laporan Pembelian Barang</h2>
        <h4>Outlet X</h4>
        <h6></h6>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Pembelian</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Harga per Unit</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approved_stock_ins as $stock_ins)
                <tr>
                    <td>{{$stock_ins->id}}</td>
                    <td>{{$stock_ins->order_number}}</td>
                    <td>{{$stock_ins->datetime}}</td>
                    <td>{{$stock_ins->product->name}}</td>
                    <td>{{$stock_ins->quantity}}</td>
                    <td>{{$stock_ins->price}}</td>
                    <td>{{$stock_ins->total_price}}</td>
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