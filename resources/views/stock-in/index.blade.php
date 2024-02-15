@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Pembelian Barang</h1>
        <div class="searchStockIn">
            <form action="" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="stock_in_start_date" class="form-label">Tanggal mulai</label>
                        <input type="date" class="form-control" id="stock_in_start_date" name="stock_in_start_date" value="{{ Request()->stock_in_start_date }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="stock_in_end_date" class="form-label">Tanggal akhir</label>
                        <input type="date" class="form-control" id="stock_in_end_date" name="stock_in_end_date" value="{{ Request()->stock_in_end_date }}">
                    </div>
                    <div class="col-md-2 form-group" style="margin-top:25px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="/stock-in/index" class="btn btn-success">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @if($role=='user')
            <div class="addButton">
                <a href="/stock-in/create">Tambah Transaksi Pembelian</a>
            </div>
            @endif
            <form action="{{ route('exportStockIn') }}" method="GET">
                <input type="hidden" class="form-control" name="stock_in_start_date" value="{{ Request()->stock_in_start_date }}">
                <input type="hidden" class="form-control" name="stock_in_end_date" value="{{ Request()->stock_in_end_date }}">
                <a class="btn btn-success" href="{{ url('/stock-in/exportStockIn?stock_in_start_date='.Request::get('stock_in_start_date').'&stock_in_end_date='.Request::get('stock_in_end_date')) }}">Export ke .XLSX</a>
            </form>
            <form action="{{ route('generateStockInPDF') }}" method="GET">
                <input type="hidden" class="form-control" name="stock_in_start_date" value="{{ Request()->stock_in_start_date }}">
                <input type="hidden" class="form-control" name="stock_in_end_date" value="{{ Request()->stock_in_end_date }}">
                <button class="btn btn-info">Export ke .PDF</button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Pembelian</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Nama Barang</th>
                    <th colspan="2" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($getStockIns as $stock_in)
                <tr>
                    <td>{{$stock_in->id}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->supplier->name}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->product->name}}</td>
                    <td><a href="/stock-in/{{ $stock_in->id }}" class="btn btn-info">View</a></td>
                    @if($role=='admin')
                    <form action="/stock-in/{{ $stock_in->id }}" method="POST">
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