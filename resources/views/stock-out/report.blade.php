@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Laporan Penjualan Barang</h1>
        <div class="input-stockOutDateRange">
            <form action="/stock-out/report" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label for="stock_out_start_date" class="form-label">Tanggal mulai</label>
                        <input type="date" class="form-control" id="stock_out_start_date" name="stock_out_start_date">
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="stock_out_end_date" class="form-label">Tanggal akhir</label>
                        <input type="date" class="form-control" id="stock_out_end_date" name="stock_out_end_date">
                    </div>
                    <div class="col-md-2 form-group" style="margin-top:25px;">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </form>
        </div>

        <div class="reportTitle">
            <h3>Outlet X</h3>
            <h5>Periode: {{ $stock_out_start_date }} - {{ $stock_out_end_date }}</h5>
        </div>

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
                @php $i=1 @endphp
                @foreach($stock_outs as $stock_out)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->customer->user->name}}</td>
                    <td>{{$stock_out->product->name}}</td>
                    <td>{{$stock_out->quantity}}</td>
                    <td>{{$stock_out->notes}}</td>
                    <td>{{$stock_out->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="print-section">
            <a href="{{ route('generateStockOutPDF') }}">Export ke .PDF</a>
            <a href="{{ route('exportStockOut') }}">Export ke .XLSX</a>
        </div>
    </div>
</div>
@endsection