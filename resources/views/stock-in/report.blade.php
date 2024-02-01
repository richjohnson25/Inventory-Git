@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Laporan Pembelian Barang</h1>
        <div class="input-stockInDateRange">
            <form action="/stock-in/report" method="GET">
                @csrf
                <div class="mb-3 row">
                    <label for="stock_in_start_date" class="form-label">Tanggal mulai</label>
                    <input type="date" class="form-control" id="stock_in_start_date" name="stock_in_start_date">
                </div>
                <div class="mb-3 row">
                    <label for="stock_in_end_date" class="form-label">Tanggal akhir</label>
                    <input type="date" class="form-control" id="stock_in_end_date" name="stock_in_end_date"><br>
                </div>
                <button type="submit" class="loginBtn">Cari</button>
            </form>
        </div>

        <h3>Outlet X</h3>
        <h5>Periode: {{ $stock_in_start_date }} - {{ $stock_in_end_date }}</h5>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Pembelian</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Harga per Unit</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($stock_ins as $stock_in)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->product->name}}</td>
                    <td>{{$stock_in->supplier->name}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->price}}</td>
                    <td>{{$stock_in->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="print-section">
            <a href="{{ route('generateStockInPDF') }}">Export ke .PDF</a>
            <a href="{{ route('exportStockIn') }}">Export ke .XLSX</a>
        </div>
    </div>
</div>
@endsection