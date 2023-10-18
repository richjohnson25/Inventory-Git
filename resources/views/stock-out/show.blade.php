@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h2 class="title">Daftar Penjualan Barang</h2>
        <form class="search-form">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
        </form>
        <div class="addButton">
            <a href="/stock_out/addTransaction">Tambah Transaksi Penjualan</a>
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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
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
                    <td>{{$stock_out->status}}</td>
                    @if($role=='admin' && $stock_out->status=='Pending')
                    <td>
                        <a href="/stock_out/approval/{{ $stock_out->id }}" class="btn btn-primary">Approve</a>
                        <a href="/stock_out/approval/{{ $stock_out->id }}" class="btn btn-danger">Reject</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection