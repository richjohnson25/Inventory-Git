@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Penjualan Barang</h1>
        <form class="search-form search-holder">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit" class="searchBtn">Search</button>
        </form>
        @if($role=='user')
        <div class="addButton">
            <a href="/stock-out/create">Tambah Transaksi Penjualan</a>
        </div>
        @endif

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
                @foreach($stock_out_transactions as $stock_out)
                <tr>
                    <td>{{$stock_out->id}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->customer->user->name}}</td>
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection