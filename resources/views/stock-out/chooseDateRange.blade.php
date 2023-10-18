@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Laporan Penjualan Barang</h2>
        <form method="GET" action="/stock_out/report">
            <div class="float-container form-holder">
                <label for="start_date">Tanggal mulai</label>
                <input type="date" id="start_date" name="start_date"><br>
                <label for="end_date">Tanggal akhir</label>
                <input type="date" id="end_date" name="end_date"><br>
                <button type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>
@endsection