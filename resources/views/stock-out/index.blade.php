@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Penjualan Barang</h1>
        <div class="searchStockOut">
            <form action="" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="stock_out_start_date" class="form-label">Tanggal mulai</label>
                        <input type="date" class="form-control" id="stock_out_start_date" name="stock_out_start_date">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="stock_out_end_date" class="form-label">Tanggal akhir</label>
                        <input type="date" class="form-control" id="stock_out_end_date" name="stock_out_end_date">
                    </div>
                    <div class="col-md-2 form-group" style="margin-top:25px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="/stock-out/index" class="btn btn-success">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @if($role=='user')
            <div class="addButton">
                <a href="/stock-out/create">Tambah Transaksi Penjualan</a>
            </div>
            @endif
            <form action="{{ route('exportStockOut') }}" method="GET">
                <input type="hidden" class="form-control" name="stock_out_start_date" value="{{ Request()->stock_out_start_date }}">
                <input type="hidden" class="form-control" name="stock_out_end_date" value="{{ Request()->stock_out_end_date }}">
                <a class="btn btn-success" href="{{ url('/stock-out/exportStockOut?stock_out_start_date='.Request::get('stock_out_start_date').'&stock_out_end_date='.Request::get('stock_out_end_date')) }}">Export ke .XLSX</a>
            </form>
            <form action="{{ route('generateStockOutPDF') }}" method="GET">
                <input type="hidden" class="form-control" name="stock_out_start_date" value="{{ Request()->stock_out_start_date }}">
                <input type="hidden" class="form-control" name="stock_out_end_date" value="{{ Request()->stock_out_end_date }}">
                <button class="btn btn-info">Export ke .PDF</button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Penjualan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Nama Barang</th>
                    <th colspan="2" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($getStockOuts as $stock_out)
                <tr>
                    <td>{{$stock_out->id}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->customer->name}}</td>
                    <td>{{$stock_out->quantity}}</td>
                    <td>{{$stock_out->product->name}}</td>
                    <td><a href="/stock-out/{{ $stock_out->id }}" class="btn btn-info">View</a></td>
                    @if($role=='admin')
                    <form action="/stock-out/{{ $stock_out->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <td><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="100%">No data found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection