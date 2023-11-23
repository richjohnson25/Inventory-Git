@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Laporan Penjualan Barang</h1>
        <form action="/stock-out/report" method="GET">
            @csrf
            <div class="mb-3 row">
                <label for="start_date" class="form-label">Tanggal mulai</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="mb-3 row">
                <label for="end_date" class="form-label">Tanggal akhir</label>
                <input type="date" class="form-control" id="end_date" name="end_date"><br>
            </div>
            <button type="submit" class="loginBtn">Cari</button>
        </form>
    </div>
</div>
@endsection