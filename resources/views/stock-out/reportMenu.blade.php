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
    </div>
</div>
@endsection